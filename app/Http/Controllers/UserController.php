<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        if(isset(auth()->user()->id)){
            return redirect()->route('dashboard');
        }else{
            return view('backend.pages.login');
        }
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

    public function userlist(){
        $user=User::paginate(10);
        return view('backend.pages.user.userlist',compact('user'));
       
    }


    public function active(Request $request,$user_id)
    {
      
        $user=User::find($user_id);
        $user->update([

         'status'=>'active'
        ]);
        return redirect()->route('user.list')->with('message','Active successfully');

    
    }


    public function reject(Request $request,$user_id)
    {
      
        $user=User::find($user_id);
        $user->update([

         'status'=>'reject'
        ]);
        return redirect()->route('user.list')->with('message','User is not active');

    
    }


    
}
