<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    
    public function donateview(){
            return view('frontend.pages.donateview');
        
    }

    public function donatenow(Request $request){


        

            $user=User::create([
                'name'=>$request->donor_name,
                'email'=>$request->donor_email,
                'password'=> bcrypt($request->donor_password),
                'status'=>'active',
                'role'=>$request->role,
                'address'=>$request->address,
               
                
                
             ]);

             $fileName=null;
            if($request->hasFile('image'))
             {
            //generate name
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
             }


             Donor::create([
                
                'phone_number'=>$request->phone,
                'user_id'=>$user->id,
                'gender'=>$request->gender,
                'image'=>$fileName
    
            ]);


            Donation::create([
                'amount'=>$request->amount,
                'user_id'=>$user->id,
                'details'=>$request->donation_type,
                'phone_number'=>$request->payment_phone,
                'payment_method'=>$request->payment,
                'transaction_id'=>$request->transaction_id
            ]);
            notify()->success('Donation Successfull');
            return redirect()->back();

         
    }
        
     
}
