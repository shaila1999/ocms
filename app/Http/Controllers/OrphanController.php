<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrphanController extends Controller
{
    public function center(){
        $orphan=Orphan::orderBy('id','DESC')->paginate(10);
        return view('backend.pages.orphan.center',compact('orphan'));
    }


    public function CreateForm(){
        return view('backend.pages.orphan.createForm');
    }


  
    public function info(Request $request)
    {
       // dd($request->all);
        $request->validate([
           'name'=>'required',
           'age'=>'required',
           'gender'=>'required|not_in:none',
           'image'=>'required'

           
        ]);
         

        $fileName=null;
        if($request->hasFile('image'))
        {
            
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }
       

         //dd($request->all());
         Orphan::create([
         //database column name=> input field name
         'name'=>$request->name,
         'age'=>$request->age,
         'gender'=>$request->gender,
         'status'=>$request->status,
         'image'=>$fileName   

        ]);

        return redirect()->route('orphans')->with('message','add successfully');
    }




    public function deleteOrphan($orphan_id) 
    {  
        Orphan::findOrFail($orphan_id)->delete();
        return redirect()->back()->with('message','orphan deleted successfully.');
    } 


    public function viewOrphan($orphan_id)
    {
       $orphan=Orphan::find($orphan_id);
       return view('backend.pages.orphan.view',compact('orphan'));
    } 
    
    
    public function edit($orphan_id)
    {
        $orphan=Orphan::find($orphan_id);
       // $categories=Category::all();
        return view('backend.pages.orphan.edit',compact('orphan'));
    }



    public function update(Request $request,$orphan_id)
    {
      
        $orphan=Orphan::find($orphan_id);
        $fileName=$orphan->image;

        if($request->hasFile('image'))
        {
            $removeFile=public_path().'/uploads/'.$fileName;
            File::delete($removeFile);
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'gender'=>'required|not_in:none',
            'image'=>'required'
 
            
         ]);
          
 


        //dd($request->all());
        $orphan->update([

         'name'=>$request->name,
         'age'=>$request->age,
         'gender'=>$request->gender,
         'status'=>$request->status,
         'image'=>$fileName  
            

        ]);
        return redirect()->route('orphans')->with('message','Update seccesfully');

    
    }
}