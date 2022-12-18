@extends('backend.master')


@section('content')
<h1 class="h1">User List</h1>
@if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Email</th>
      <th scope="col">Name</th>
      <th scope="col">Role</th>
      <th scope="col">Address</th>
      <th scope="col">status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
   
  @foreach($user as $key => $data)
    <tr>
      <th scope="row">{{++$key}}</th>
      <td>{{($data->email)}}</td>
      <td>{{($data->name)}}</td>
      <td>{{($data->role)}}</td>
      <td>{{($data->address)}}</td>
      <td>{{($data->status)}}</td>
      

        <td> 
        @if($data->role!='admin')
            @if($data->status!='active')      
            <a href="{{route('user.active',$data->id)}}" class="btn btn-primary">Active</a>
            @endif
            
            @if($data->status=='active') 
            <a href="{{route('user.reject',$data->id)}}" class="btn btn-danger">Reject</a>
           @endif
        @endif 
        </td>

        
    </tr>
    
    @endforeach
   
  </tbody>
</table>
{{$user->links()}}


@endsection