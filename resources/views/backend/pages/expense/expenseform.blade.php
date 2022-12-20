@extends('backend.master')

@section('content')

<h1 class="h1">Expense form</h1>
<form class="w-50" action="{{route('expense.details')}}" method="post">

    @if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

    <div class="form-group my-3">
        <label for="name">Current Balance:{{$currentBalance}} </label>
        
    </div>

    
    <div class="form-group my-3">
        <label for="name">Enter Amount </label>
        <input required name="amount" type="number" class="form-control" id="name" placeholder="Enter amount">
    </div>



    <div class="form-group my-3">
        <label for="">Expense Type</label>
        <select name="expense_type" class="form-select" aria-label="Default select example">
            <option selected value="none" >Open this select menu</option>
            <option value="orphans">Orphans</option>
            <option value="staffs">Staffs</option>
            <option value="others">Others</option>
        </select>
    </div>
    <input value="{{$currentBalance}}" type="hidden" name="current_balance">

    <div class="form-group my-3">
        <label for="">Purpose</label>
        <input required name="description" type="text" class="form-control" id="name" placeholder="Enter purpose">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
