<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Donation;
use App\Models\Expense;
use App\Models\Orphan;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Dashboard(){
        $orphans=Orphan::all();

        $parents=User::where('role','parent')
        ->where('status','active')
        ->get();

        $donors=User::where('role','donor')
        ->where('status','active')
        ->get();

        $staffs=Staff::all();

        $total_donations=Donation::sum('amount');

        $total_expenses=Expense::sum('amount');


        $pending_req=User::where('status','!=','active')
        ->limit(5)
        ->orderBy('id','DESC')
        ->get();


        $donorlist = DB::table('users')
            ->join('donors', 'users.id', '=', 'donors.user_id')
            ->select('users.*', 'donors.*')
            ->where('users.status', '=', 'active')
            ->orderBy('users.id','DESC')
            ->limit(5)
            ->get();

        $donationlist = DB::table('users')
            ->join('donations', 'users.id', '=', 'donations.user_id')
            ->select('users.*', 'donations.*')
            ->orderBy('users.id','DESC')
            ->limit(5)
            ->get();

        $expenses=Expense::paginate(5);




        if(auth()->user()->role=='donor'){
            $donation=DB::table('donations')
            ->where('user_id',auth()->user()->id)
            ->orderBy('id','DESC')
            ->get();

            $total_donations=Donation::where('user_id',auth()->user()->id)->sum('amount');

        return view('backend.pages.dashboard',compact('donation','total_donations'));
            
        }
        

        if(auth()->user()->role=='parent'){
            $adoption=DB::table('adoptions')
            ->where('parent_id',auth()->user()->id)
            ->orderBy('id','DESC')
            ->get();

            $total_adoption=Adoption::where([['parent_id',auth()->user()->id],['status','=','approved']])->count('id');

        return view('backend.pages.dashboard',compact('adoption','total_adoption'));
            
        }
        
        
        //dd($parents);
        return view('backend.pages.dashboard',compact('orphans','parents','donors','staffs','total_donations','total_expenses','pending_req','donorlist','donationlist','expenses'));
    }
    
}
