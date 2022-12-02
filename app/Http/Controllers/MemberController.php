<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    Public function list(){
        $mem=Member:: paginate(5);
        //dd($mem);
        return view('backend.pages.member.list',compact('mem'));
    }

    public function createForm(){
        return view('backend.pages.member.create');
    }
   
    
    
    public function access(Request $request){

        $request->validate([
            'name'=>'required|unique:member,name',
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
         Member::create([
            //database column name=> input field name
            'name'=>$request->name,
            'address'=>$request->address,
            'phone_number'=>$request->phone,
            'donation'=>$request->donation,
            'email'=>$request->email,
            'status'=>$request->status,
           'image'=>$fileName

        ]);

       //return view('backend.pages.member.list');
       return redirect()->back();

    }
}
