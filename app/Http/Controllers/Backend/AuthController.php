<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller{

    public function login(){
        return view('Backend.Auth.login');
    }


    public function loginPost(Request $request){
        // dd($request->all());
        $validation = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        if ($validation->fails()) {
            notify()->error('Invalid credentials');
            return redirect()->back();
        }
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)){
            notify()->success('Logged in successfull');
            return redirect()->route('web.home');
        }
        else{
            notify()->error('Invalid credentials');
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        notify()->success('Logged out successfull');
        return redirect()->route('web.home');
    }

    public function registration(){
        $roles = Role::where('id','!=',1)->get();
        return view('Backend.Auth.registration',compact('roles'));
    }

    public function registrationPost(Request $request){
        // dd($request->all());
        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'password'=>'required'
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
                $image->storeAs('/users',$filename);
            }
            User::create([
                'name'=>$request->name,
                'role_id'=>$request->role_id,
                'image'=>$filename,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'phone'=>$request->phone,
                'address'=>$request->address
            ]);
            notify()->success('Registration successfull. please Login');
            return to_route('user.login');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }
}
