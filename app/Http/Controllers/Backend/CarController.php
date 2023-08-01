<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller{


    public function index(){
        $search=request()->query('search');
        if($search){
            $cars = Car::with('Roles')
                    ->where('name','like',"%$search%")
                    ->orWhere('model','like',"%$search%")
                    ->get();
        }else{
            $cars = Car::with('Roles')->get();
        }
        return view('Backend.Car.index', compact('cars','search'));
    }
}
