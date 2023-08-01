<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CarController;
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
Route::get('user-delete/{id}',[UserController::class,'delete'])->name('user.delete');

#Brand
Route::get('brand-index',[BrandController::class,'index'])->name('brand.index');
Route::get('brand-create',[BrandController::class,'create'])->name('brand.create');
Route::post('brand-store',[BrandController::class,'store'])->name('brand.store');
Route::get('brand-show/{id}',[BrandController::class,'show'])->name('brand.show');
Route::get('brand-edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
Route::put('brand-update/{id}',[BrandController::class,'update'])->name('brand.update');
Route::get('brand-delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

#car
Route::get('car-index',[CarController::class,'index'])->name('car.index');
Route::get('car-create',[CarController::class,'create'])->name('car.create');
Route::post('car-store',[CarController::class,'store'])->name('car.store');
Route::get('car-show/{id}',[CarController::class,'show'])->name('car.show');
Route::get('car-edit/{id}',[CarController::class,'edit'])->name('car.edit');
Route::put('car-update/{id}',[CarController::class,'update'])->name('car.update');
Route::get('car-delete/{id}',[CarController::class,'delete'])->name('car.delete');


