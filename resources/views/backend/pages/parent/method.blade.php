@extends('backend.master')

@section('content')

<h1>Parent List</h1>
<a href="{{route('parent.create')}}" class="btn btn-success">
  Create Parents
</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">address</th>
      <th scope="col">phone_number</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($name as $data)
    <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->name)}}</td>
      <td>{{($data->address)}}</td>
      <td>{{($data->phone_number)}}</td>
      <td>
                <a href="{{route('parent.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('admin.parent.delete',$data->id)}}" class="btn btn-danger">Delete</a>
                <a href="{{route('admin.parent.view',$data->id)}}" class="btn btn-success">View</a>
      </td>
    </tr>
    @endforeach
   
  </tbody>
</table>

{{$name->links()}}





@endsection






