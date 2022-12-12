<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\File;

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
            'name'=>'required',
            'phone' => 'required',
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

        return redirect()->route('members')->with('message','create seccesfully');

    }



    public function deleteMember($member_id) 
    {
        Member::findOrFail($member_id)->delete();
        return redirect()->back()->with('message','member deleted successfully.');
    }



    public function viewMember($member_id)
    {
       $member=Member::find($member_id);
       return view('backend.pages.member.view',compact('member'));
    } 



    public function editMember($member_id)
    {
       $member=Member::find($member_id);
       return view('backend.pages.member.edit',compact('member'));
    }



    public function update(Request $request,$member_id)
    {
      
        $member=Member::find($member_id);
        $fileName=$member->image;

        if($request->hasFile('image'))
        {
            $removeFile=public_path().'/uploads/'.$fileName;
            File::delete($removeFile);
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }



        //dd($request->all());
        $member->update([
            //database column name=> input field name
            'name'=>$request->name,
            'address'=>$request->address,
            'phone_number'=>$request->phone,
            'donation'=>$request->donation,
            'email'=>$request->email,
            'status'=>$request->status,
           'image'=>$fileName

        ]);
        return redirect()->route('members')->with('message','Update seccesfully');
    }





}
