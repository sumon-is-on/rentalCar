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
            $cars = Car::with('Brands')
                    ->where('name','like',"%$search%")
                    ->orWhere('model','like',"%$search%")
                    ->get();
        }else{
            $cars = Car::with('Brands')->get();
        }
        return view('Backend.Car.index', compact('cars','search'));
    }


    public function create(){
        $brands = Brand::all();
        $car = new Car();
        return view('Backend.Car.create',compact('brands','car'));
    }

    public function store(Request $request){
        // dd($request->all());
        $validation = Validator::make($request->all(),[
            'number'=>'required|unique:cars,number',
        ]);
        if ($validation->fails()) {
            notify()->error('Something went wrong');
            return redirect()->back();
        }
        try {
            $filename=null;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $filename=date('Ymdhis').'.'.$image->getClientOriginalExtension();
                $image->storeAs('/cars',$filename);
            }
            Car::create([
                'name'=>$request->name,
                'brand_id'=>$request->brand_id,
                'model'=>$request->model,
                'seat'=>$request->seat,
                'number'=>$request->number,
                'price'=>$request->price,
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

    public function show($id){
        $car = Car::find($id);
        return view('Backend.Car.show',compact('car'));
    }



    public function edit($id){
        $brands = Brand::all();
        $car = Car::find($id);
        return view('Backend.Car.edit',compact('car','brands'));
    }


    public function update(Request $request,$id){
        $car = Car::find($id);
        try {
            $filename=null;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $filename=date('Ymdhis').'.'.$image->getClientOriginalExtension();
                $image->storeAs('/cars',$filename);
            }
            $car->update([
                'name'=>$request->input('name',$car->name),
                'brand_id'=>$request->input('brand_id',$car->brand_id),
                'image'=>$filename ?? $car->image,
                'model'=>$request->input('model',$car->model),
                'seat'=>$request->input('seat',$car->seat),
                'number'=>$request->input('number',$car->number),
                'price'=>$request->input('price',$car->price),
                'details'=>$request->input('details',$car->details)
            ]);
            $car->save();
                notify()->success('Car updated successfully');
                return to_route('car.index');
        } catch (\Throwable $th) {
                notify()->error($th->getMessage());
                return redirect()->back();
        }
    }


    public function delete($id){
        $car=Car::find($id);
        if($car){
            $car->delete();
            notify()->success('Car deleted successfully');
            return to_route('car.index');
        }else{
            notify()->info('Car invalid');
            return to_route('car.index');
        }
    }
}
