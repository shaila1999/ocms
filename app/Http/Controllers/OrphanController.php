<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrphanController extends Controller
{
    public function center(){
        return view('backend.pages.orphan.center');
    }
    public function CreateForm(){
        return view('backend.pages.orphan.createForm');
    }
}
