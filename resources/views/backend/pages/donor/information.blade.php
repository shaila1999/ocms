@extends('backend.master')




@section('content')

<h1>Donor Information</h1>  
@if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

    @if(session()->has('error'))
        <p class="alert alert-danger">{{session()->get('error')}}</p>
    @endif
<a href="{{route('donor.create')}}" class="btn btn-success">
  Donor Details
  </a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Donor Id</th>
      <th scope="col">Donor Name</th>
      <th scope="col">Donor Address</th>
      <th scope="col">Donor Phone_number</th>
      <th scope="col">Donor Image</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($donate as $data)
    <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->name)}}</td>
      <td>{{($data->address)}}</td>
      <td>{{($data->phone_number)}}</td>
      <td>
               

                <img width="50px" style="border-radius: 20px" src="{{url('/uploads/'.$data->image)}}" alt="staff_image">
            </td>

            <td>
                <a href="{{route('donor.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('admin.donor.delete',$data->id)}}" class="btn btn-danger">Delete</a>
                <a href="{{route('admin.donor.view',$data->id)}}" class="btn btn-success">View</a>
            </td>
    </tr>
    @endforeach
   
  </tbody>
</table>

{{$donate->links()}}

@endsection