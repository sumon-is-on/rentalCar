<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('Web.Home');});
Route::get('/admin', function () {return view('Backend.Dashboard');});

