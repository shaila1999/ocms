<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Orphan;
use App\Models\Parents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WebHomeController extends Controller
{
    public function webHome(){
        return view('frontend.pages.home');
    }

    public function registration(Request $request){
        
       
        $user=User::create([
            'name'=>$request->donor_name,
            'email'=>$request->donor_email,
            'password'=> bcrypt($request->donor_password),
            'role'=>$request->role,
            'status'=>'inactive',
            'address'=>$request->address
         ]);
         
        if($user->role=='donor'){
            return redirect()->route('donor.create')->with('id',$user->id);
        }

        if($user->role=='parent'){
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
            if(auth()->user()->status!='active'){
               
                notify()->error('Account Inactive.Contact With Admin');
                auth()->logout();     
            }
            else
            {
                notify()->success('Login success');
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
    
        
    


    public function parentlist(Request $request){
        $request->validate([
            'parent_name'=>'required',
            'phone_number'=>'required'
        ]);

       
         Parents::create([
            //database column name=> input field name
            'name'=>$request->parent_name,
            'address'=>$request->parent_address,
            'phone_number'=>$request->phone_number,
            'email'=>$request->parent_email
            ]);
        
        return redirect()->route('parents')->with('message','create successfully');
    }

    /*public function orphanview($view_id)
    {
        $view=Orphan::find($view_id);
        return view('frontend.pages.orphanview',compact('view'));
    }*/


    public function adoptnow($orphan_id){
        $orphan = Orphan::find($orphan_id);
        return view ('frontend.pages.adoptnow',compact('orphan'));
    }


    
    public function adoptorphan(Request $request,$orphan_id)
    {
        $orphan = Orphan::find($orphan_id);
        $request->validate([
            
            'status'=>'required'
           
        ]);
         

       
        // dd($request->all());
            Adoption::create([
            //database column name=> input field name
            'parent_id'=>auth()->user()->id,
            'orphan_id'=>$orphan->id,
            'status'=>$request->status


        ]);
        return redirect()->route('home')->with('message','adopt successfully');
    }  
    
    



      public function  profile (){

        return view('frontend.pages.profile');
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


