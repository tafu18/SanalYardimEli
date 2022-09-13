<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function adminLogin(Request $request){
        
        $student_no = request('student_no');
        $password = request('password');
        $admin = DB::select("SELECT * FROM admins WHERE student_no = '$student_no'");
        
        if($admin != null){
        
            if($password == $admin[0]->password){
                $message = $admin[0]->name ." Giriş Başarılı...";
                $url = "admin";
                session_start();
                $_SESSION['flag'] = true; 
                return redirect()->to($url)->with('message', $message);
            }
        
            else{
                $message = "Şifre Hatalı. Lütfen Tekrar Deneyiniz...";
                $flag = false;
                return back()->withInput()->with('message', $message);
            }

        }else{
            $message = "Kullanıcı Bulunamadı. Lütfen Tekrar Deneyiniz...";
            $flag = false;
            return back()->withInput()->with('message', $message);
        }
        /* dd($request->post()); */
    }


    public function getAllData(){
        $donationsToplam = DB::select("SELECT count(*) AS Counter FROM `donations` WHERE `status` != 2");
        $donations = DB::select('SELECT * FROM `donations` WHERE `status` != 2  ORDER BY id DESC');
        $counterDonation = 1;

        $demandsToplam = DB::select("SELECT count(*) AS Counter FROM `demands` WHERE `status` != 2");
        $demands = DB::select('SELECT * FROM `demands` WHERE `status` != 2 ORDER BY id DESC');
        $counterDemand = 1;

        return view('admin', array('donations' => $donations, 'donationsToplam' => $donationsToplam, 'counterDonation' => $counterDonation, 'demands' => $demands, 'demandsToplam' => $demandsToplam, 'counterDemand' => $counterDemand));
    }

    public function getAllDataLastDonation(){
        $donationsToplam = DB::select("SELECT count(*) AS Counter FROM `donations` WHERE `status` = 2");
        $donations = DB::select('SELECT * FROM `donations` WHERE `status` = 2  ORDER BY id DESC');
        $counterDonation = 1;

        $demandsToplam = DB::select("SELECT count(*) AS Counter FROM `demands` WHERE `status` = 2");
        $demands = DB::select('SELECT * FROM `demands` WHERE `status` = 2 ORDER BY id DESC');
        //$demands = DB::table('demands')->where('status', '=', 2)->paginate(5);
        $counterDemand = 1;

        return view('last_donation', array('donations' => $donations, 'donationsToplam' => $donationsToplam, 'counterDonation' => $counterDonation, 'demands' => $demands, 'demandsToplam' => $demandsToplam, 'counterDemand' => $counterDemand));
    }

    public function controlDonation(){
        $queryControlCounter = DB::select("SELECT COUNT(*) as Counter FROM `donation_and_demand_control`"); //counter
        $queryControl = DB::select("SELECT * FROM `donation_and_demand_control`"); //controls
        $counterControl = 1;
    

        return view('control', array('controls' => $queryControl, 'counter' => $queryControlCounter, 'counterControl' => $counterControl));
    }

    public function controlDonationPost(){
        $queryControlCounter = DB::select("SELECT COUNT(*) as Counter FROM `donation_and_demand_control`"); //counter
        $counter = $queryControlCounter[0]->Counter;

        for ($i = 1; $i <= $counter; $i++){
            $input_id = "input" . $i;
            if(request($input_id)){
                $donation_id = request('donationid' . $i);
                $demand_id = request('demandid' . $i);

                //$deneme = DB::update("UPDATE `donations` SET `status` = 10 WHERE donation_uniq_id = '$donation_id'");
                $donation_query = DB::select("SELECT * FROM `donations` WHERE `donation_uniq_id` = '$donation_id'");
                $donation_type = $donation_query[0]->donation;
                

                $img_src = 'images/donations_img/' . $donation_id . '_' . $demand_id . '.jpg';
                $sql = DB::insert("INSERT INTO `donation_and_demand_match`(`donation_id`, `demand_id`, `donation_name`, `img_src`) VALUES ('$donation_id', '$demand_id', '$donation_type', '$img_src')");
                
                if($sql){

                    $sql_delete = DB::delete("DELETE FROM `donation_and_demand_control` WHERE `demand_id` = '$demand_id'");
    
                    $set_demand = DB::update("UPDATE `demands` SET `status` = 2 WHERE demand_uniq_id = '$demand_id'");
    
                    $matchCounter = DB::select("SELECT COUNT(*) as Counter FROM `donation_and_demand_match` WHERE `donation_id` = '$donation_id'"); //counter
                    $counterMatch = $matchCounter[0]->Counter;


                    if($donation_query[0]->qty == $counterMatch){
                        $set_donation = DB::update("UPDATE `donations` SET `status` =  2 WHERE donation_uniq_id = '$donation_id'");
                    }
                    $result = "Bağış Başarı İle Gerçekleştirildi";
                } 
                else $result = "HATA!!! Bağış Başarısız!!!"; 


                return back()->with('message', $result);
            }
        }
    }


}
