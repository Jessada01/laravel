<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('register','register')->middleware('nowlogin');
    Route::post('register-user','registerUser')->name('register.user');

    Route::get('login','login')->middleware('nowlogin');;
    Route::post('login-user','loginUser')->name('login.user');

    Route::get('dashboard','dashboard')->middleware('checklogin');
    Route::get('logout','logout');

});
