<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Dashboard(){
        return view('backend.pages.dashboard');
    }
    public function Contact(){
        return view('backend.pages.contact');
    }
}
