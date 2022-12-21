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
        $expense=Expense::orderBy('id','DESC')->paginate(10);
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
    public function deleteExpense($expense_id) 
    {
        Expense::findOrFail($expense_id)->delete();
        return redirect()->back()->with('message','expense deleted successfully.');
    } 

    public function edit($expense_id)
    {
        $expense=Expense::find($expense_id);
    
        return view('backend.pages.expense.edit',compact('expense'));
    }




    public function update(Request $request,$expense_id)
    {
      
        $expense=Expense::find($expense_id);
        


        //dd($request->all());
        $expense->update([
            'amount'=>$request->amount,
            'type'=>$request->expense_type,
            'purpose'=>$request->description,
            

        ]);
        return redirect()->route('expense.list')->with('message','Update seccesfully');

    
    }

    


}
