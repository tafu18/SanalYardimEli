<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\FormController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('index');
});
 */
Route::get('/', [DonationsController::class, 'sumDonations'])->name('main');

Route::get('/donation_form', [FormController::class, 'donationType']);

Route::post('/donation_form', [FormController::class, 'addDonation'])->name('addDonation');

Route::get('/demand_form', [FormController::class, 'demandType']);

Route::post('/demand_form', [FormController::class, 'addDemand'])->name('addDemand');




Route::get('/slider', function () {
    return view('slider');
});


Route::get('/admin', function(){
    return view('admin');
});

Route::get('/control', function(){
    return view('control');
});

Route::get('/donations', function(){
    return view('donations');
});

Route::get('/demands', function(){
    return view('demands');
});

Route::get('/gallery', function(){
    return view('gallery');
});

Route::get('/demand_details', function(){
    return view('demand_details');
});

Route::get('/donation_details', function(){
    return view('donation_details');
});

Route::get('/demand_form', function(){
    return view('demand_form');
});


Route::get('/last_donation', function(){
    return view('last_donation');
});





