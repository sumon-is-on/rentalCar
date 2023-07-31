<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{
    public function index(Request $request){


        $search=request()->query('search');
        if($search){
            $users=User::where('name','like',"%$search%")
            ->orWhere('email','like',"%$search%")
            ->orWhere('phone','like',"%$search%")->get();
        }else{
            $users=User::with('Roles')->get();
        }
        // dd($users);
        return view('Backend.User.index',compact('users','search'));
    }



    public function create(){
        $roles=Role::where('id','!=',1)->get();
        $user=new User();
        return view('Backend.User.create',compact('roles','user'));
    }



    public function post(Request $request){
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
            notify()->success('User created successfully');
            return to_route('user.index');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }
}
