<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('backend.pages.login');
    }

    public function doLogin(Request $request){
        $credentials=$request->except('_token');
       // dd($credentials);
        
if(Auth::attempt($credentials))
{
    return redirect()->route('dashboard');
}
//dd('login failed');

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back()->with('message','logout successful.');
    }
}
