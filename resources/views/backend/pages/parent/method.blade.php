@extends('backend.master')

@section('content')

<h1 class="h1">Parent List</h1>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone number</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Occupation</th>
      <th scope="col">Annual Income</th>
      <th scope="col">Marital Status</th>
      <th scope="col">N-ID</th>
      <th scope="col">Family Member</th>
      <th scope="col">Adoption History</th>
      <th scope="col">Blood Group</th>
      <th scope="col">Image</th>
      

    </tr>
  </thead>
  <tbody>
  @foreach($name as $data)
    <tr>
      <th scope="row">{{($data->id)}}</th>
      <td>{{($data->name)}}</td>
      <td>{{($data->address)}}</td>
      <td>{{($data->phone_number)}}</td>
      <td>{{($data->email)}}</td>
      <td>{{($data->gender)}}</td>
      <td>{{($data->occupation)}}</td>
      <td>{{($data->annual_income)}}</td>
      <td>{{($data->marital_status)}}</td>
      <td>{{($data->n_id)}}</td>
      <td>{{($data->family_member)}}</td>
      <td>{{($data->adoption_history)}}</td>
      <td>{{($data->blood_group)}}</td>
      <td>
      <img width="50px" style="border-radius: 20px" src="{{url('/uploads/'.$data->image)}}" alt="parent_image">
      </td> 
      
    </tr>
    @endforeach
   
  </tbody>
</table>


@endsection






