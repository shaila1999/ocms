@extends('backend.master')


@section('content')

<h1>Member List</h1>
@if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

    @if(session()->has('error'))
        <p class="alert alert-danger">{{session()->get('error')}}</p>
    @endif
<a href="{{route('member.create')}}" class="btn btn-success">
  Create New Member
</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Member Id</th>
      <th scope="col">Member Name</th>
      <th scope="col">Member Address</th>
      <th scope="col">Phone_number</th>
      <th scope="col">Amount of Donation</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  <tbody>
  @foreach($mem as $data)
  <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->name)}}</td>
      <td>{{($data->address)}}</td>
      <td>{{($data->phone_number)}}</td>
      <td>{{($data->donation)}}</td>
      <td>{{($data->status)}}</td>
     <td>
        <img width="50px" style="border-radius: 30px" src="{{url('/uploads/'.$data->image)}}" alt="member_image">
     </td>
      <td>
          <a href="{{route('member.edit',$data->id)}}" class="btn btn-primary">Edit</a>
          <a href="{{route('admin.member.delete',$data->id)}}" class="btn btn-danger">Delete</a>
          <a href="{{route('admin.member.view',$data->id)}}" class="btn btn-success">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$mem->links()}}




@endsection