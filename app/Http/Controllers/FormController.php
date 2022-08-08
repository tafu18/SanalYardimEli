<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormModelDonation;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function donationType(){
        $donation_type = request('donation_type');
        return View('donation_form', array('donation_type' => $donation_type));
    }

    public function demandType(){
        $demand_type = request('demand_type');
        return View('demand_form', array('demand_type' => $demand_type));
    }
    
    public function addDonation(){
        $donation_type_inp = request('donation_type_inp');
        $query_demands = DB::select("SELECT * FROM `demands` WHERE `status` = 0 AND `demand` = '$donation_type_inp' ORDER BY id ASC");
        

        if(request('firstname') != null){
            $name = request('firstname') . ' ' . request('lastname');
            $phone = request('phone');
            $email = request('email');
            $qty = request('qty');
            $donation_form = request('type');
            $address = request('address');
            $another = request('another');
            $donation = request('donation_type_inp');
            $token = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);
            
            $img_src = "";
            if($donation == "Yemek Kartı Yardımı (Üniversite için)") $img_src = "images/neu-footer-logo.png";
            elseif($donation == "Elbise Yardımı") $img_src = "images/kiyafet.png";
            elseif($donation == "Ayakkabı Yardımı") $img_src = "images/ayakkabi.png";
            elseif($donation == "Yakacak Yardımı") $img_src = "images/komur.png";
            elseif($donation == "Eğitim Masrafı Yardımı") $img_src = "images/egitim.png";
            elseif($donation == "Kitap Yardımı") $img_src = "images/kitap.png";
            elseif($donation == "Fatura Yardımı") $img_src = "images/fatura.png";
            elseif($donation == "İaşe Yardımı") $img_src = "images/yemek.png";
            elseif($donation == "Diğer Yardım") $img_src = "images/diger.png";
        
            //$sql = $db->prepare("INSERT INTO `donations`(`name`,`donation_uniq_id`, `donation`, `email`, `phone`, `qty`, `qty_control`, `donation_form`, `address`, `another`) VALUES ('$name', '$token', '$donation', '$email', '$phone', '$qty', '$qty', '$qty', '$donation_form', '$address', '$another')");
            $add = DB::insert("INSERT INTO `donations`(`name`, `donation_uniq_id`, `donation`, `email`, `phone`, `qty`, `qty_control`, `donation_form`, `address`, `another`, `img_src`) VALUES ('$name', '$token', '$donation', '$email', '$phone', '$qty', '$qty', '$donation_form', '$address', '$another', '$img_src')");

            if($add) $result = "Başarılı";
            else $result = "Başarısız!!!"; 
            
            $getDonationById = DB::table('donations')->where('donation_uniq_id', $token)->first();
            //echo $getDonationById->name;
            if($query_demands != null){
                foreach($query_demands as $query_demand){
                    if($getDonationById->qty_control > 0){
                        $demand_id = $query_demand->demand_uniq_id;
                        $img_src = $token . '_' . $demand_id . ".jpg";
                        
                        $addControl = DB::insert("INSERT INTO `donation_and_demand_control` (`donation_di`, `demand_id`, `img_src`) VALUES ('$token', '$demand_id', '$img_src')");
                        
                        if($addControl) $getDonationById->qty_control = $getDonationById->qty_control - 1;
                        $updateQtyControl = DB::update("UPDATE `donations` SET `qty_control` =" . $getDonationById->qty_control . " WHERE donation_uniq_id = '$token'");
                        $updateDemandStatus = DB::update("UPDATE `demands` SET `status` = 1 WHERE demand_uniq_id = '$demand_id'");

                        if($getDonationById->qty_control == 0){
                            $set_donation_status_2 = DB::update("UPDATE `donations` SET `status` = 1 WHERE donation_uniq_id = '$token'");        
                        } 
                    }
                }
            }

        }
        return redirect()->to('/')->with('message', $result);
    }

    public function addDemand(){
        $demand_type_inp = request('demand_type_inp');


        $donations = DB::select("SELECT * FROM `donations` WHERE `status` = 0 AND `donation` = '$demand_type_inp' AND `qty_control` > 0 ORDER BY id ASC LIMIT 1");

        $firstDayThisDay = date("Y-m-d H:i:s" ,strtotime('1/1 this year'));
        $firstDayNextDay = date("Y-m-d H:i:s" ,strtotime('1/1 next year'));


        $name = strtoupper(request('firstname') . ' ' . request('lastname'));
        $phone = request('phone');
        $email = request('email');
        $address = request('address');
        @$gender = request('gender');
        @$size = request('size');
        @$shoes_size = request('shoes_size');
        $another = request('another');
        $demand = $demand_type_inp;
        $token = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);

        $counter = DB::select("SELECT count(*) as `counter` FROM `demands` WHERE `phone` = '$phone' AND `name` = '$name' AND `created_at` > '$firstDayThisDay' AND `created_at` < '$firstDayNextDay'");
        
        if($counter[0]->counter < 3){
            $add = DB::insert("INSERT INTO `demands`(`name`,`demand_uniq_id`, `demand`, `email`, `phone`, `address`, `gender`, `size`, `shoes_size`, `another`) VALUES ('$name', '$token', '$demand', '$email', '$phone', '$address', '$gender', '$size', '$shoes_size',  '$another')");
            if($add) $result = "Başarılı";
            else $result = "Başarısız!!!"; 
        }else{
            $result = "Senelik 3 Talep Hakkınız Dolmuştur!!!";
        }        
        if(count($donations) > 0){
            $donation_id = $donations[0]->donation_uniq_id;
            $img_src = $donation_id . "_" . $token . ".jpg";

            $sql_control = DB::insert("INSERT INTO `donation_and_demand_control` (`donation_di`, `demand_id`, `img_src`) VALUES ('$donation_id', '$token', '$img_src')");

            if($sql_control) $donations[0]->qty_control = $donations[0]->qty_control - 1;

                $set_donation_qty_control = DB::update("UPDATE `donations` SET `qty_control` =" . $donations[0]->qty_control . " WHERE donation_uniq_id = '$donation_id'");

                $set_donation_status = DB::update("UPDATE `demands` SET `status` = 1 WHERE demand_uniq_id = '$token'");

            if($donations[0]->qty_control == 0 ){

                $set_donation_qty_control_0 = DB::update("UPDATE `donations` SET `status` = 1 WHERE donation_uniq_id = '$donation_id'");
                
            }
        }
        return redirect()->to('/')->with('message', $result);
    }


}
