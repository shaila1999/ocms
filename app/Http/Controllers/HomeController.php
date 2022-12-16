<?php

namespace App\Http\Controllers;

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
        ->get();


        $donorlist = DB::table('users')
            ->join('donors', 'users.id', '=', 'donors.user_id')
            ->select('users.*', 'donors.*')
            ->where('users.status', '=', 'active')
            ->limit(5)
            ->get();

            $donationlist = DB::table('users')
            ->join('donations', 'users.id', '=', 'donations.user_id')
            ->select('users.*', 'donations.*')
            ->limit(5)
            ->get();

            $expenses=Expense::paginate(5);
        
        
        //dd($parents);
        return view('backend.pages.dashboard',compact('orphans','parents','donors','staffs','total_donations','total_expenses','pending_req','donorlist','donationlist','expenses'));
    }
    
}
