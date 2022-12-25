<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Donor;
use App\Models\Orphan;
use App\Models\Parents;
use App\Models\Staff;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class WebHomeController extends Controller
{
    public function webHome(){
        $staffs=Staff::all();
        return view('frontend.pages.home',compact('staffs'));
    }



    public function registration(Request $request){

        $request->validate([
            'donor_name'=>'required',
            'donor_email'=>'required|email',
            'address'=>'required',
            'donor_password'=>'required'
        ]);

        $duplicateMail=DB::table('users')
                        ->where('email',$request->donor_email)
                        ->get();
                        
        if(isset($duplicateMail[0]->id)){
            notify()->error($duplicateMail[0]->email.' email Already Used,please login');
            return redirect()->back();            
        }
        
      
        $user=User::create([
            'name'=>$request->donor_name,
            'email'=>$request->donor_email,
            'password'=> bcrypt($request->donor_password),
            'role'=>$request->role,
            'status'=>'inactive',
            'address'=>$request->address,
            
         ]);
         
        if($user->role=='donor'){
            Session::put('user_id',$user->id);
            return redirect()->route('donor.create')->with('id',$user->id);
        }

        if($user->role=='parent'){
            Session::put('user_id',$user->id);
            return redirect()->route('parent.create')->with('id',$user->id);
        }
         //notify()->success('Registration success');
         //return redirect()->back();
        
    }

    public function login(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $credentials=$request->except('_token');
        if(auth()->attempt($credentials))
        {
            if(auth()->user()->role!='admin'){
                if(auth()->user()->status!='active'){
               
                    notify()->error('Account Inactive.Need to Admin Permission');
                    auth()->logout();     
                }
                else
                {
                    notify()->success('Login success');
                }
            }
            else{
                notify()->error('Admin can\'t Login');
                auth()->logout(); 
            }
            
            
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
    
    public function orphanlist(){
        $orphan=Orphan::all();
        return view('frontend.pages.orphanlist',compact('orphan'));
    }

    public function parentform()
    {
    
        $parent=DB::table('users')
        ->join('parents', 'users.id', '=', 'parents.user_id')
        ->select('users.*', 'parents.*') 
        ->get();
        return view('frontend.pages.parentform',compact('parent'));
    }

    public function donorlist()
    {
        $donor=DB::table('users')
        ->join('donors', 'users.id', '=', 'donors.user_id')
        ->select('users.*', 'donors.*') 
        ->get();
        return view('frontend.pages.donorlist',compact('donor'));
    }
    
        
    


    

    /*public function orphanview($view_id)
    {
        $view=Orphan::find($view_id);
        return view('frontend.pages.orphanview',compact('view'));
    }*/


    

    
    public function adoptorphan(Request $request,$orphan_id)
    {
        $orphan = Orphan::find($orphan_id);
       
           
      
         
    
       
        // dd($request->all());
            Adoption::create([
            //database column name=> input field name
            'parent_id'=>auth()->user()->id,
            'orphan_id'=>$orphan->id,
            'status'=>'pending'


        ]);
        notify()->success('Request Pending,Contact With Admin.');
        return redirect()->back();
    }  
    
    



      public function  profile (){

        $donor = null;
        if(auth()->user()->role == "donor"){

            $donor = Donor::where("user_id",auth()->user()->id)->first();
        }
        elseif(auth()->user()->role == "parent"){

            $donor = Parents::where("user_id",auth()->user()->id)->first();
        }
        // dd($donor);
        return view('frontend.pages.profile',compact('donor'));
    }

        public function updateProfile(Request $request)
       {
        //validation

        $user=User::find(auth()->user()->id);
        $user->update([
           'name'=>$request->user_name,
           'address'=>$request->user_address,
           'role'=>$request->role,
           
        ]);

        notify()->success('User profile updated.');
        return redirect()->back();
    }

}


