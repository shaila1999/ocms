@extends('backend.master')


@section('content')

<h1 class="h1">Orphan List</h1>
@if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

    @if(session()->has('error'))
        <p class="alert alert-danger">{{session()->get('error')}}</p>
    @endif
<a href="{{route('orphan.create')}}" class="btn btn-success">
  Add New Orphan
  </a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Orphan Id</th>
      <th scope="col">Orphan Name</th>
      <th scope="col">Orphan Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($orphan as $data)
    <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->name)}}</td>
      <td>{{($data->age)}}</td>
      <td>{{($data->gender)}}</td>
      <td>{{($data->status)}}</td>
      <td>
               

                <img width="50px" style="border-radius: 20px" src="{{url('/uploads/'.$data->image)}}" alt="orphan_image">
            </td>

            <td>
                <a href="{{route('orphan.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('admin.orphan.delete',$data->id)}}" class="btn btn-danger">Delete</a>
                <a href="{{route('admin.orphan.view',$data->id)}}" class="btn btn-success">View</a>
            </td>
    </tr>
    @endforeach
   
  </tbody>
</table>

{{$orphan->links()}}

@endsection