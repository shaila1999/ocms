<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Orphan;
use App\Models\Parents;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function adopt(){
        $adopt=Adoption::orderBy('id','DESC')->paginate(10);

        return view('backend.pages.adoption.adoptlist',compact('adopt'));
    }

    public function adoptlist(){
        $adopt=Adoption::paginate(10);
        return view('backend.pages.adoption.adopt',compact('adopt'));
    }

    public function adoptform(Request $request)
    {
        $request->validate([
            'parent_id'=>'required',
            'orphan_id'=>'required',
            'status'=>'required'
           
        ]);
         
        // dd($request->all());
            Adoption::create([
            //database column name=> input field name
            'parent_id'=>$request->parent_id,
            'orphan_id'=>$request->orphan_id,
            'status'=>$request->status

        ]);
        return redirect()->route('adoptions')->with('message','create successfully');
    }


    public function approve($id){
      $adoptionid=explode(':',$id)[0]; 
      $orpanid=explode(':',$id)[1]; 
        Adoption::find($adoptionid)->update([
            'status'=>'approved'
        ]);
        Orphan::find($orpanid)->update([
            'status'=>'adopt'
        ]);
            return redirect()->route('adoptions')->with('message','Adoption completed');
    }
        
    public function reject($id){
        Adoption::find($id)->update([
            'status'=>'rejected'
        ]);
        return redirect()->route('adoptions')->with('message','Rejected');
    }

}
