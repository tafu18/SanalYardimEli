<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donations;
use Illuminate\Support\Facades\DB;

class DonationsController extends Controller
{
    //SELECT SUM(`qty`) AS `sum` , `donation` FROM `donations` GROUP BY `donation` ORDER BY `sum` DESC
    public function sumDonations(){

        $donationsType = [
            '1' => ['donation_code' => "1",    'donation_name' => "Yemek Kartı Yardımı (Üniversite için)",  'donation_img' => "images/neu-footer-logo.png", 'donation_color' => "#253949"],
            '2' => ['donation_code' => "2",    'donation_name' => "Elbise Yardımı",  'donation_img' => "images/kiyafet.png", 'donation_color' => "#45A074"],
            '3' => ['donation_code' => "3",    'donation_name' => "Ayakkabı Yardımı",  'donation_img' => "images/ayakkabi.png", 'donation_color' => "#287AB8"],
            '4' => ['donation_code' => "4",    'donation_name' => "Yakacak Yardımı",  'donation_img' => "images/komur.png", 'donation_color' => "#3C3F46"],
            '5' => ['donation_code' => "5",    'donation_name' => "Eğitim Masrafı Yardımı",  'donation_img' => "images/egitim.png", 'donation_color' => "#FFCC00"],
            '6' => ['donation_code' => "6",    'donation_name' => "Kitap Yardımı",  'donation_img' => "images/kitap.png", 'donation_color' => "#6CEEEC"],
            '7' => ['donation_code' => "7",    'donation_name' => "Fatura Yardımı",  'donation_img' => "images/fatura.png", 'donation_color' => "#8B0000"],
            '8' => ['donation_code' => "8",    'donation_name' => "İaşe Yardımı",  'donation_img' => "images/yemek.png", 'donation_color' => "#FFAF3D"],
            '9' => ['donation_code' => "9",    'donation_name' => "Diğer Yardım",  'donation_img' => "images/diger.png", 'donation_color' => "#BB78BC"],
        ];


        $toplam = DB::select('SELECT SUM(`qty`) AS `sum` , `donation`, img_src FROM `donations` GROUP BY `donation` ORDER BY `sum` DESC');
        return view('index', array('donations' => $toplam, 'donationsType' => $donationsType));
    }

}
