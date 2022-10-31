<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    Public function list(){
        return view('backend.pages.members');
    }
}
