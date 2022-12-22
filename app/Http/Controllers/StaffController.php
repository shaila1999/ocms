<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\File;

class StaffController extends Controller
{
    public function stafflist(){
        $list=Staff::orderBy('id','DESC')->paginate(10);
        //dd($list);  
        return view('backend.pages.staff.stafflist',compact('list'));
    }
    public function createlist(){
        return view('backend.pages.staff.createlist');
    }


    public function care(Request $request)
    {
        $request->validate([
            'staff_name'=>'required',
            'staff_phone'=>'required|numeric|digits:11',
            'staff_address'=>'required',
            'designation'=>'required',
            'staff_mail'=>'required',
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
         Staff::create([
            //database column name=> input field name
            'name'=>$request->staff_name,
            'address'=>$request->staff_address,
            'designation'=>$request->designation,
            'phone_number'=>$request->staff_phone,
            'email'=>$request->staff_mail,
            //'image'=>$request->image,
            'image'=>$fileName

        ]);
        return redirect()->route('staff.list')->with('message','create seccesfully');

    } 


    public function deleteStaff($staff_id) 
    {
        Staff::findOrFail($staff_id)->delete();
        return redirect()->back()->with('message','staff deleted successfully.');
    } 


    public function viewStaff($staff_id)
    {
       $staff=Staff::find($staff_id);
       return view('backend.pages.staff.view',compact('staff'));
    } 
    
    
    public function edit($staff_id)
    {
        $staff=Staff::find($staff_id);
       // $categories=Category::all();
        return view('backend.pages.staff.edit',compact('staff'));
    }




    public function update(Request $request,$staff_id)
    {
      
        $staff=Staff::find($staff_id);
        $fileName=$staff->image;

        if($request->hasFile('image'))
        {
            $removeFile=public_path().'/uploads/'.$fileName;
            File::delete($removeFile);
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }
        $request->validate([
            'staff_name'=>'required',
            'staff_phone'=>'required|numeric|digits:11',
            'staff_address'=>'required',
            'designation'=>'required',
            'staff_mail'=>'required',
            'image'=>'required'
           
        ]);


        //dd($request->all());
        $staff->update([
            //database column name=> input field name
            'name'=>$request->staff_name,
            'address'=>$request->staff_address,
            'designation'=>$request->designation,
            'phone_number'=>$request->staff_phone,
            'email'=>$request->staff_mail,
            //'image'=>$request->image,
            'image'=>$fileName

        ]);
        return redirect()->route('staff.list')->with('message','Update seccesfully');

    
    }


    



    


}
