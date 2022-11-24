@extends('backend.master')


@section('content')

<h1>Staffs List</h1>  
@if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

    @if(session()->has('error'))
        <p class="alert alert-danger">{{session()->get('error')}}</p>
    @endif

<a href="{{route('staff.create')}}" class="btn btn-primary">
Create Staff
</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Staff Id</th>
      <th scope="col">Staff Name</th>
      <th scope="col">Staff Address</th>
      <th scope="col">Staff Phone_number</th>
      <th scope="col">Staff Image</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($list as $data)
    <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->name)}}</td>
      <td>{{($data->address)}}</td>
      <td>{{($data->phone_number)}}</td>
      <td>
               

                <img width="50px" style="border-radius: 20px" src="{{url('/uploads/'.$data->image)}}" alt="staff_image">
            </td>

            <td>
                <a href="{{route('staff.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('admin.staff.delete',$data->id)}}" class="btn btn-danger">Delete</a>
                <a href="{{route('admin.staff.view',$data->id)}}" class="btn btn-success">View</a>
            </td>
    </tr>
    @endforeach
   
  </tbody>
</table>

{{$list->links()}}




@endsection

