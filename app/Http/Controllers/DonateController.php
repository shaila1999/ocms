<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DonateController extends Controller
{
    
    public function donateview(){
            return view('frontend.pages.donateview');
        
    }

    public function donatenow(Request $request){


        $request->validate([
            'donor_name'=>'required',
            'donor_email'=>'required',
            'donor_password'=>'required',
            'donation_type'=>'required|not_in:none',
            'address'=>'required',
            'phone'=>'required|numeric|digits:11',
            'amount'=>'required',
            'payment'=>'required|not_in:none',
            'payment_phone'=>'required|numeric|digits:11',
            'transaction_id'=>'required', 
            'gender'=>'required|not_in:none',
            'image'=>'required'
 
            
         ]);

         $duplicateMail=DB::table('users')
                        ->where('email',$request->donor_email)
                        ->get();
                        
        if(isset($duplicateMail[0]->id)){
            Donation::create([
                'amount'=>$request->amount,
                'user_id'=>$duplicateMail[0]->id,
                'details'=>$request->donation_type,
                'phone_number'=>$request->payment_phone,
                'payment_method'=>$request->payment,
                'transaction_id'=>$request->transaction_id
            ]);

            $user=User::find($duplicateMail[0]->id);
            $user->update([

                'password'=>bcrypt($request->donor_password),
               ]);

            notify()->success('Donation Successfull, Please Login to see your donation history');
            return redirect()->back();
    

        }
        else{

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
        
     
}
