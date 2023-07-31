<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
