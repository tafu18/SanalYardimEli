<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function getMatchData(){
        return view('gallery', [
            'matches' => DB::table('donation_and_demand_match')->orderBy('id')->paginate(8),
        ]);
    }
}
