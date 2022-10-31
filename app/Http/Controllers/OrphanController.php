<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrphanController extends Controller
{
    public function list(){
        return view('backend.pages.orphans');
    }
}
