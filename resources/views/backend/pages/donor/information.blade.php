@extends('backend.master')




@section('content')

<h1 class="h1">Donor List</h1>  
@if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

    @if(session()->has('error'))
        <p class="alert alert-danger">{{session()->get('error')}}</p>
    @endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Donor Name</th>
      <th scope="col">Donor Address</th>
      <th scope="col">Donor Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Gender</th>
      <th scope="col">Image</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($donate as $data)
    <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->name)}}</td>
      <td>{{($data->address)}}</td>
      <td>{{($data->email)}}</td>
      <td>{{($data->phone_number)}}</td>
      <td>{{($data->gender)}}</td>
      <td>
      <img width="50px" style="border-radius: 20px" src="{{url('/uploads/'.$data->image)}}" alt="donor_image">
      </td>         
    </tr>
  @endforeach
  </tbody>
</table>



@endsection