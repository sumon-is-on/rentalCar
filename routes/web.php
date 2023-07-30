<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'home'])->name('web.home');
Route::get('/admin', function () {return view('Backend.Dashboard');});

#auth
Route::get('user-login',[AuthController::class,'login'])->name('user.login');
Route::post('login-post',[AuthController::class,'loginPost'])->name('user.login.post');
Route::get('logout',[AuthController::class,'logout'])->name('user.logout');
#user
Route::get('user-index',[UserController::class,'index'])->name('user.index');

