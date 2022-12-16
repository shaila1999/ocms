<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expenselist()
    {
        $expense=Expense::paginate(10);
        return view('backend.pages.expense.expenselist',compact('expense'));
    }

    public function expenseform()
    {
        return view('backend.pages.expense.expenseform');
    }


    public function details(Request $request){

        $request->validate([
          'amount'=>'required'

        ]);

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
