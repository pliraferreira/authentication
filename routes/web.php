<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisterController;
use App\Mail\emailTeste;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', HomePage::class)->name('home');
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login.form');
    Route::post('/login', [AuthenticationController::class, 'logar'])->name('login');

    Route::get('/forget-password', [PasswordResetController::class, 'request'])->name('password.request');
    Route::post('/forget-password', [PasswordResetController::class, 'email'])->name('password.email');

    Route::get('/reset-password', [PasswordResetController::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('password.update');
});


Route::get('/', function () {
    return view('welcome');
});



