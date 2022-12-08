@extends('backend.master')



@section('content')

<h1>Adopt List</h1>
@if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

    @if(session()->has('error'))
        <p class="alert alert-danger">{{session()->get('error')}}</p>
    @endif
<a href="{{route('adopt.list')}}" class="btn btn-success">
  Add New Orphan
  </a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Orphan Id</th>
      <th scope="col">Parent Id</th>
      <th scope="col">Status</th>
      

    </tr>
  </thead>
  <tbody>
  @foreach($adopt as $data)
    <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->id)}}</td>
      <td>{{($data->id)}}</td>
      <td>{{($data->status)}}</td>
     
           
    </tr>
    @endforeach
   
  </tbody>
</table>

{{$adopt->links()}}





@endsection