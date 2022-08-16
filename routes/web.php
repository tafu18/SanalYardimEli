<?php

use App\Http\Controllers\DemandsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;


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

Route::get('/donations', [DonationsController::class, 'getDonations']);

Route::get('/demands', [DemandsController::class, 'getDemands']);

Route::get('/demand_details', [DemandsController::class, 'getDemandDetails']);

Route::get('/donation_details', [DonationsController::class, 'getDonationDetails']);

Route::get('/login', function () { return view('login');});

Route::post('/login', [AdminController::class, 'adminLogin'])->name('login');

Route::get('/admin', [AdminController::class, 'getAllData']);

Route::get('/last_donation', [AdminController::class, 'getAllDataLastDonation']);

Route::get('/slider', function () {
    return view('slider');
});

Route::get('/control', function(){
    return view('control');
});


Route::get('/gallery', function(){
    return view('gallery');
});



Route::get('/welcome', function(){
    return view('welcome');
});





