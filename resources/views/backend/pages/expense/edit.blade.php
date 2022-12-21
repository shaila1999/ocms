@extends('backend.master')




@section('content')
<h1 class="h1"> Update Expense</h1>
<form class="w-50" action="{{route('expense.update',$expense->id)}}" method="post">
@method('put')  

    @if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

    

    
    <div class="form-group my-3">
        <label for="name">Enter Amount </label>
        <input value="{{$expense->amount}}" required name="amount" type="number" class="form-control" id="name" placeholder="Enter amount">
    </div>



    <div class="form-group my-3">
        <label for="">Expense Type</label>
        <select name="expense_type" class="form-select" aria-label="Default select example">
            <option selected value="none" >Open this select menu</option>
            <option value="orphans" {{($expense->type=='orphans')?'selected':''}}>Orphans</option>
            <option value="staffs" {{($expense->type=='staffs')?'selected':''}}>Staffs</option>
            <option value="others" {{($expense->type=='others')?'selected':''}}>Others</option>
        </select>
    </div>
   

    <div class="form-group my-3">
        <label for="">Purpose</label>
        <input value="{{$expense->purpose}}" required name="description" type="text" class="form-control" id="name" placeholder="Enter purpose">
    </div>


    <button type="submit" class="btn btn-primary">Update</button>
</form>


@endsection