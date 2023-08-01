<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller{


    public function index(Request $request){
        $search=request()->query('search');
        if($search){
            $brands = Brand::where('name','like',"%$search%")
                    ->orWhere('email','like',"%$search%")
                    ->get();
        }else{
            $brands = Brand::all();
        }
        return view('Backend.Brand.index', compact('brands','search'));
    }


    public function create(){
        $brand = new Brand();
        return view('Backend.Brand.create',compact('brand'));
    }



    public function store(Request $request){
        $validation = Validator::make($request->all(),[
            'name'=>'required|unique:brands,name',
        ]);
        if ($validation->fails()) {
            notify()->error('Enter all the fields');
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
                'country'=>$request->country,
                'image'=>$filename,
                'details'=>$request->details,
            ]);
            notify()->success('Brand created successfully');
            return to_route('brand.index');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }


    public function show($id){
        $brand = Brand::find($id);
        return view('Backend.Brand.show',compact('brand'));
    }

    public function edit($id){
        $brand = Brand::find($id);
        return view('Backend.Brand.edit',compact('brand'));
    }

    public function update(Request $request,$id){
        $brand = Brand::find($id);
        try {
            $filename=null;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $filename=date('Ymdhis').'.'.$image->getClientOriginalExtension();
                $image->storeAs('/users',$filename);
            }
            $brand->update([
                'name'=>$request->input('name',$brand->name),
                'country'=>$request->input('country',$brand->country),
                'image'=>$filename ?? $brand->image,
                'details'=>$request->input('details',$brand->details)
            ]);
            $brand->save();
                notify()->success('Brand updated successfully');
                return to_route('brand.index');
        } catch (\Throwable $th) {
                notify()->error($th->getMessage());
                return redirect()->back();
        }
    }


    public function delete($id){
        $brand=Brand::find($id);
        if($brand){
            $brand->delete();
            notify()->success('Brand deleted successfully');
            return to_route('brand.index');
        }else{
            notify()->info('Brand invalid');
            return to_route('brand.index');
        }
    }
}
