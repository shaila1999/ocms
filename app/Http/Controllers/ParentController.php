<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ParentController extends Controller
{
    public function method(){
        $name = DB::table('users')
            ->join('parents', 'users.id', '=', 'parents.user_id')
            ->select('users.*', 'parents.*')
            //->where('users.role', '=', 'parents')
            ->get();
       //$name=Parents::paginate(5);
       //dd($name);
        return view('backend.pages.parent.method',compact('name'));
    }
    public function name(){
        return view('backend.pages.parent.name');
    }

    public function class(Request $request){
        $request->validate([
            'phone'=>'required',
            'income'=>'required',
            'n_id'=>'required',
            'occupation'=>'required',
            'blood_group'=>'required|not_in:none',
            'family_member'=>'required',
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
         Parents::create([
            //database column name=> input field name
            'phone_number'=>$request->phone,
            'gender'=>$request->gender,
            'user_id'=>$request->user_id,
            'occupation'=>$request->occupation,
            'n_id'=>$request->n_id,
            'annual_income'=>$request->income,
            'marital_status'=>$request->marital_status,
            'family_member'=>$request->family_member,
            'adoption_history'=>$request->adoption_history,
            'blood_group'=>$request->blood_group,
            'image'=>$fileName
            ]);
            
            notify()->success('Registration success');
         
            return redirect()->route('home')->with('message','Parent created successfully');
       

    }

/*
    public function deleteParent($parent_id) 
    {
        Parents::findOrFail($parent_id)->delete();
        return redirect()->back()->with('message','parent deleted successfully.');
    } 


    public function viewParent($parent_id)
    {
       $parent=Parents::find($parent_id);
       return view('backend.pages.parent.view',compact('parent'));
    } 



    public function edit($parent_id)
    {
        $parent=Parents::find($parent_id);
       // $categories=Category::all();
        return view('backend.pages.parent.edit',compact('parent'));
    }



    public function update(Request $request,$parent_id)
    {
      
        $parent=Parents::find($parent_id);
        $fileName=$parent->image;

        if($request->hasFile('image'))
        {
            $removeFile=public_path().'/uploads/'.$fileName;
            File::delete($removeFile);
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }


         // dd($request->all());
         $parent->update([
            //database column name=> input field name
            'name'=>$request->parent_name,
            'address'=>$request->parent_address,
            'phone_number'=>$request->phone_number,
            'email'=>$request->parent_email
            

        ]);
        return redirect()->route('parents')->with('message','Update seccesfully');

    }
    */


}

