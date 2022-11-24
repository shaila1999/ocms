<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function webHome(){
        return view('frontend.pages.home');
    }

    public function registration(Request $request){
        
        User::create([
            'name'=>$request->donor_name,
            'email'=>$request->donor_email,
            'mobile'=>$request->donor_phone,
            'password'=> bcrypt($request->donor_password),
             'role'=>'donor'
         ]);
 
         return redirect()->back()->with('message','Registration Success.');
    }

    public function login(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);


    }
}
