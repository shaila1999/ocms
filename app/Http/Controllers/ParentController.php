<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parents;

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
            'parent_name'=>'required|unique:parents,name'
        ]);
       
         Parents::create([
            //database column name=> input field name
            'name'=>$request->parent_name,
            'address'=>$request->parent_address,
            'phone_number'=>$request->phone_number
            

    ]);
        // return view('backend.pages.parent.name');
         return redirect()->back();


    }
}
