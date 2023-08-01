<?php

namespace App\Http\Controllers\Backend;

use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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


    public function create(){
        $brands = Brand::all();
        $car = new Car();
        return view('Backend.Car.create',compact('brands','car'));
    }

    public function store(Request $request){
        $validation = Validator::make($request->all(),[
            'number'=>'required|unique:cars,number',
        ]);
        if ($validation->fails()) {
            notify()->error('Enter all the fields and Number must be unique');
            return redirect()->back();
        }
        try {
            $filename=null;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $filename=date('Ymdhis').'.'.$image->getClientOriginalExtension();
                $image->storeAs('/brands',$filename);
            }
            Brand::create([
                'name'=>$request->name,
                'brand_id'=>$request->brand_id,
                'model'=>$request->model,
                'seat'=>$request->seat,
                'number'=>$request->number,
                'image'=>$filename,
                'details'=>$request->details,
            ]);
            notify()->success('Car created successfully');
            return to_route('car.index');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }
}
