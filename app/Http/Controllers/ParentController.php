<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parents;
use Illuminate\Support\Facades\File;

class ParentController extends Controller
{
    public function method(){
       $name=Parents::paginate(5);
       //dd($name);
        return view('backend.pages.parent.method',compact('name'));
    }
    public function name(){
        return view('backend.pages.parent.name');
    }

    public function class(Request $request){
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
        
        return redirect()->route('parents')->with('message','create seccesfully');

    }


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
    


}
