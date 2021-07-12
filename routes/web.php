<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SubupController;
use App\Http\Controllers\TranscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;



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

Route::get('/', function () {
    return redirect('home');
});


Route::get('home', function(){
    $id_session = User::find(session('id_session'));

    if(isset($id_session)){
        return view('home')->with('nome', $id_session->nome);
    }
    else{
        return view('home')->with('nome', '');
    }
});

Route::get('login', [LoginController::class, 'login']);
Route::post('login', [LoginController::class, 'submit']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('signup', [SignupController::class, 'signup']);
Route::post('signup', [SignupController::class, 'signup_submit']);

Route::get('payment', [PaymentController::class, 'payment']);
Route::post('payment', [PaymentController::class, 'payment_submit']);

Route::get('subup', [SubupController::class, 'subup']);
Route::post('subup', [SubupController::class, 'subup_submit']);
Route::get('subup/data', [SubupController::class, 'metodi_pagamento']);

Route::get('transcriptions', [TranscriptionController::class, 'transcriptions']);
Route::post('transcriptions', [TranscriptionController::class, 'download']);

Route::get('userpage', [UserController::class, 'userpage']);
Route::post('userpage', [UserController::class, 'disdici_sub']);

Route::get('changePassword', [ChangePasswordController::class, 'changepw']);
Route::post('changePassword', [ChangePasswordController::class, 'change_submit']);