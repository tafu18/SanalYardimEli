<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function adminLogin(){
        
        $student_no = request('student_no');
        $password = request('password');
        $admin = DB::select("SELECT * FROM admin_control WHERE student_no = '$student_no'");
        
        if($admin != null){
        
            if($password == $admin[0]->password){
                $message = $admin[0]->name ." Giriş Başarılı...";
                $url = "admin";
                return redirect()->to($url)->with('message', $message);
            }
        
            else{
                $message = "Şifre Hatalı. Lütfen Tekrar Deneyiniz...";
                $deneme = "Denmee";
                return back()->withInput()->with('message', $message);
            }

        }else{
            $message = "Kullanıcı Bulunamadı. Lütfen Tekrar Deneyiniz...";
            return back()->withInput()->with('message', $message);
        }
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
        $counterDemand = 1;

        return view('last_donation', array('donations' => $donations, 'donationsToplam' => $donationsToplam, 'counterDonation' => $counterDonation, 'demands' => $demands, 'demandsToplam' => $demandsToplam, 'counterDemand' => $counterDemand));
    }
















}
