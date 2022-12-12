<?php

namespace App\Http\Controllers;

//use App\Models\Donation;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function donate(){
        $donate=Donation::paginate(10);
        return view('backend.pages.donation.donate',compact('donate'));
    }
        
    public function donationform(){
        return view('backend.pages.donation.donationform');
    }


    public function donationdonate(Request $request){
        
        //dd($request->all());
        
       $donate=Donation::create([
            //database column name=> input field name
            'user_id'=>$request->user_id,
            'amount'=>$request->amount,
            'details'=>$request->donation_type,
            'phone_number'=>$request->phone,
            'payment_method'=>$request->payment,
            
        ]);
        $donate=$donate->id;
        return redirect()->route('donation.confirmation')->with('id',$donate);
          
    
    }


    public function confirmation(){
        return view('backend.pages.donation.confirmation');
    }

    public function paymentconfirmation(Request $request){

        //dd($request->all());
    
        $donate=Donation::find($request->donation_id);

        $donate->update([
            //database column name=> input field name
            'transaction_id'=>$request->transaction_id,
        ]);
         return redirect()->route('donations')->with('message','donation seccesfully');
            
    }
    


    
     
        
}