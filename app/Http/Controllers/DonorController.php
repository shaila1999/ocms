<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class DonorController extends Controller
{
    public function information(){
        $donate = DB::table('users')
            ->join('donors', 'users.id', '=', 'donors.user_id')
            ->select('users.*', 'donors.*')
            ->get();
            //dd($donate);
        //$donate=Donor::paginate(5);
        return view('backend.pages.donor.information',compact('donate'));
    }
    public function donorcreate(){
        return view('backend.pages.donor.donorcreate');
    }
    public function info(Request $request)
    {
        $request->validate([ 
            'phone'=>'required',
            'image'=>'required'
           
        ]);
         

        $fileName=null;
        if($request->hasFile('image'))
        {
            //generate name
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }
       

        //dd($request->all());
         Donor::create([
            //database column name=> input field name
            'phone_number'=>$request->phone,
            'gender'=>$request->gender,
            'user_id'=>$request->user_id,
            'image'=>$fileName

        ]);
        notify()->success('Registration success');
         
        return redirect()->route('home')->with('message','Donor created successfully');
    }

/*

    public function deleteDonor($donor_id) 
    {
        Donor::findOrFail($donor_id)->delete();
        return redirect()->back()->with('message','donor deleted successfully.');
    } 


    public function viewDonor($donor_id)
    {
       $donor=Donor::find($donor_id);
       return view('backend.pages.donor.view',compact('donor'));
    } 



    public function edit($donor_id)
    {
        $donor=Donor::find($donor_id);
       // $categories=Category::all();
        return view('backend.pages.donor.edit',compact('donor'));
    }



    public function update(Request $request,$donor_id)
    {
      
        $donor=Donor::find($donor_id);
        $fileName=$donor->image;

        if($request->hasFile('image'))
        {
            $removeFile=public_path().'/uploads/'.$fileName;
            File::delete($removeFile);
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }


         // dd($request->all());
         $donor->update([
            //database column name=> input field name
            'name'=>$request->name,
            'address'=>$request->address,
            'phone_number'=>$request->phone,
            'description'=>$request->description,
            'email'=>$request->email,
            'image'=>$fileName

        ]);
        return redirect()->route('donors')->with('message','Update seccesfully');

    }
    */


}
