<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $cars=Car::with('Brands')->get();
        return view('Web.Home',compact('cars'));
    }


    public function userProfile($id){
        $user = auth()->user();
    }
}
