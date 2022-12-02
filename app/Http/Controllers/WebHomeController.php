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
            'password'=> bcrypt($request->donor_password),
            'role'=>'donor'
         ]);
         notify()->success('Registration success');
         return redirect()->back();
    }

    public function login(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $credentials=$request->except('_token');
        if(auth()->attempt($credentials))
        {
       notify()->success('Login success');
            return redirect()->back();
        }
        notify()->error('invalid password');
        return redirect()->back();


    }
    public function logout(){
        auth()->logout();
        
        notify()->success('Logout success');
            return redirect()->back();

         

    }

}
