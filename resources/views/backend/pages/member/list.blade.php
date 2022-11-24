@extends('backend.master')


@section('content')

<h1>Member List</h1>
<a href="{{route('member.create')}}" class="btn btn-success">
  Create New Member
</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Member Id</th>
      <th scope="col">Member Name</th>
      <th scope="col">Member Address</th>
      <th scope="col">Member Phone_number</th>
      <th scope="col">Member Occupation</th>
      <th scope="col">Amount of Donation</th>
      <th scope="col">Member Image</th>
    </tr>
  </thead>
  
  <tbody>
  @foreach($mem as $data)
  <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->name)}}</td>
      <td>{{($data->address)}}</td>
      <td>{{($data->phone_number)}}</td>
      <td>{{($data->occupation)}}</td>
      <td>{{($data->donation)}}</td>
     <td>
                <img src="" alt="member_image">

                <img width="100px" style="border-radius: 40px" src="{{url('/uploads/'.$data->image)}}" alt="member_image">
            </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$mem->links()}}




@endsection