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
    </tr>
  </thead>
  <tbody>
  @foreach($name as $data)
    <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->name)}}</td>
      <td>{{($data->address)}}</td>
      <td>{{($data->phone_number)}}</td>
    </tr>
    @endforeach
   
  </tbody>
</table>

{{$name->links()}}





@endsection






