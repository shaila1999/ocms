<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Expense;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ExpenseController extends Controller
{
    public function expenselist()
    {
        $expense=Expense::orderBy('id','desc')->paginate(10);
        $totalExpense = Expense::sum('amount');
        $totalDonation = Donation::sum('amount');


        return view('backend.pages.expense.expenselist',compact('expense','totalExpense','totalDonation'));
    }

    public function expenseform()
    {
        $totalExpense = Expense::sum('amount');
        $totalDonation = Donation::sum('amount');
        $currentBalance=$totalDonation-$totalExpense;

        return view('backend.pages.expense.expenseform',compact('currentBalance'));
    }


    public function details(Request $request){
        $currentbalance=$request->current_balance;
        $request->validate([
          'amount'=>"required|numeric|min:0|max:$currentbalance",
          'description'=>'required',
          'expense_type'=>'not_in:none'


        ],
        [
            'amount.max'=>'Insufficient Balance',
            'amount.min'=>'Amount greater than 0'
        ]
    );

        //dd($request->all());
         Expense::create([
            //database column name=> input field name
            'amount'=>$request->amount,
            'type'=>$request->expense_type,
            'purpose'=>$request->description,
            

        ]);

        return redirect()->route('expense.list')->with('message','Expense Noted');

    }



    


}
