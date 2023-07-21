<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;

class AdminController extends Controller
{
    public function login(){

        return view('backend.login');
    }

    // login submit with post methed

    public function submit_login(Request $request){
       $request->validate([
           'username' => 'required',
           'password' => 'required'
       ]);

       $admincheck = Admin::where(['username'=> $request->username, 'password'=> $request->password])->count(); //Count method use for if else condiation//
       if ($admincheck > 0) {
           $adminSess=Admin::where(['username'=> $request->username, 'password'=> $request->password])->first();
           session(['adminSess'=>$adminSess]);
           return redirect()->route('dashboard');
       }else{
           return redirect()->route('adminlogin')->with('error', 'Invalid username/password!');
       }

    }


    public function dashboard(){
        $data = Post::all();
        return view('backend.dashboard',['data'=>$data]);
    }

    //logout function

    public function logout(){
        session()->forget(['adminSess']);
        return redirect()->route('adminlogin');
    }
}
