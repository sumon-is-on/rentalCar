<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'home'])->name('web.home');
Route::get('/admin', function () {return view('Backend.Dashboard');});

#authLogin
Route::get('user-login',[AuthController::class,'login'])->name('user.login');
Route::post('login-post',[AuthController::class,'loginPost'])->name('user.login.post');
Route::get('logout',[AuthController::class,'logout'])->name('user.logout');


#user
Route::get('user-index',[UserController::class,'index'])->name('user.index');
Route::get('user-create',[UserController::class,'create'])->name('user.create');
Route::post('user-create',[UserController::class,'post'])->name('user.post');
Route::get('user-view/{id}',[UserController::class,'show'])->name('user.show');
Route::get('user-edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::put('user-update/{id}',[UserController::class,'update'])->name('user.update');
