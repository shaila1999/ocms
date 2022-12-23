@extends('backend.master')
@section('content')

<h1 class="h1">Donation List</h1>  
@if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

    @if(session()->has('error'))
        <p class="alert alert-danger">{{session()->get('error')}}</p>
    @endif

<table class="table">
  <thead>
    <tr>
      <th scope="col"> Id</th>
      <th scope="col">User Id</th>
      <th scope="col"> Amount</th>
      <th scope="col"> Details</th>
      <th scope="col"> Phone Number</th>
      <th scope="col"> Payment Method</th>
      <th scope="col"> Transaction Id</th>
      <th scope="col"> Action</th>
      
      

    </tr>
  </thead>
  <tbody>
  @foreach($donate as $data)
    <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->user_id)}}</td>
      <td>{{($data->amount)}}</td>
      <td>{{($data->details)}}</td>
      <td>{{($data->phone_number)}}</td>
      <td>{{($data->payment_method)}}</td>
      <td>{{($data->transaction_id)}}</td>
      <td>         
      <a href="{{route('admin.donation.view',$data->id)}}" class="btn btn-success">View</a>
      </td>
      
      
    </tr> 
   @endforeach
  </tbody>
</table>

{{$donate->links()}}


@endsection