<?php

namespace App\Http\Controllers;

//use App\Models\Donation;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function donate(){
        $donate=Donation::orderBy('id','DESC')->paginate(10);
        return view('backend.pages.donation.donate',compact('donate'));
    }
        
    public function donationform(){
        return view('backend.pages.donation.donationform');
    }


    public function donationdonate(Request $request){

        $request->validate([
           
           
            
            'amount'=>'required',
            'donation_type'=>'required|not_in:none',
            'payment'=>'required|not_in:none',
            'phone'=>'required|numeric|digits:11'
            
            
            
        ]);


        
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
        $request->validate([
        'transaction_id'=>'required', 
        ]);

        //dd($request->all());
    
        $donate=Donation::find($request->donation_id);

        $donate->update([
            //database column name=> input field name
            'transaction_id'=>$request->transaction_id,
        ]);
         return redirect()->route('dashboard')->with('message','donation successfully');
            
    }
    
    //report generates

        public function report(){
        return view('backend.pages.report.donation');
         }

        public function reportSearch(Request $request)
        {
        $validator = Validator::make($request->all(),[
            'from_date'    => 'required|date',
            'to_date'      => 'required|date|after:from_date',
        ]);

        if($validator->fails())
        {

            notify()->error('From date and to date required and to date should greater then from date.');
            return redirect()->back();
        }

        $from=$request->from_date;
        $to=$request->to_date;


        //       $status=$request->status;

        $donate=Donation::whereBetween('created_at', [$from, $to])->get();
        return view('backend.pages.report.donation',compact('donate'));


    }

    
       
}