@extends('backend.master')
@section('content')

<h1 class="h1">Expense List</h1>  
@if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

    @if(session()->has('error'))
        <p class="alert alert-danger">{{session()->get('error')}}</p>
    @endif
<a href="{{route('expense.form')}}" class="btn btn-success">
  Add Expense 
</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col"> Id</th>
      <th scope="col">Expense Type</th>
      <th scope="col"> Amount</th>
      <th scope="col"> Purpose</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($expense as $data)
    <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->type)}}</td> 
      <td>{{($data->amount)}}</td>
      <td>{{($data->purpose)}}</td>
      
      
    </tr> 
   @endforeach
  </tbody>
</table>
<span>Total expenses : {{$totalExpense}} BDT</span>
{{$expense->links()}}

@endsection