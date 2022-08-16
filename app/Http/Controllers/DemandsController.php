<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandsController extends Controller
{
    public function getDemands(){
        $demandsToplam = DB::select("SELECT count(*) AS Counter FROM `demands`");
        $demands = DB::select('SELECT * FROM `demands` ORDER BY `id` ASC');
        return view('demands', array('demands' => $demands, 'demandsToplam' => $demandsToplam));
    }

    public function getDemandDetails(){
        $id = request('demand_id');
        $demands = DB::select("SELECT * FROM `demands` WHERE demand_uniq_id = '$id'");

        $name = $demands[0]->name;
        $explode_name = explode(" ", $name);
        $cryptic_name = "";
        foreach($explode_name as $e){
            $lenght = strlen($e);
            $replace = substr_replace($e, '*****' , 1, $lenght);
            $cryptic_name = $cryptic_name . ' ' . $replace;
        }

        $demand_control = DB::select("SELECT * FROM `donation_and_demand_control` WHERE `demand_id` = '$id'");
        $demand_match = DB::select("SELECT * FROM `donation_and_demand_match` WHERE `demand_id` = '$id'");








        return view('demand_details', array('demands' => $demands, 'cryptic_name' => $cryptic_name, 'demand_control' => $demand_control, 'demand_match' => $demand_match));
    }
}