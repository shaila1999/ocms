@extends('backend.master')
@section('content')
<div class="d-flex justify-content-between py-4 "  >
  <h1 class="h1">Expense List</h1>
  <a href="{{route('expense.form')}}" class="btn btn-success">
  Add Expense 
  </a>
</div>
  
@if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

    @if(session()->has('error'))
        <p class="alert alert-danger">{{session()->get('error')}}</p>
    @endif
    <div class="container-fluid mb-3">
      <div class="row">
        <div class="col-md-3">
          <div class="card p-2 bg-info"  >
            <h4 class="mb-1 text-white" >Current Balance</h4>
            <p class="fs-3"><strong>{{$totalDonation-$totalExpense}} BDT</strong></p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card p-2 bg-success"  >
            <h4 class="mb-1 text-white">Total Donation</h4>
            <p class="fs-3"><strong>{{$totalDonation}} BDT</strong></p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card p-2 bg-warning"  >
            <h4 class="mb-1 text-white">Total Expense</h4>
            <p class="fs-3"><strong>{{$totalExpense}} BDT</strong></p>
          </div>
        </div>

      </div>
    </div>

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