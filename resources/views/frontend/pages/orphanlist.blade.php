@extends('frontend.master')



@section('content')

<h1>Orphans List</h1>

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
                
        <a href="{{route('frontend.orphan.view',$data->id)}}" class="btn btn-success">View</a>
      </td>


    </tr>

    @endforeach
   
  </tbody>
</table>



@endsection