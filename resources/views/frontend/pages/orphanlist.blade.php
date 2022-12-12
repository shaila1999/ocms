@extends('frontend.master')



@section('content')



<div class="container">
  <div class="row">
    <div class="col-12 py-3">
    <h1 class="h1">Orphans List</h1>
    </div>
   
    @foreach($orphan as $data)
    <div class="col-md-6 col-lg-4">

      <div class="card">
        <img src="{{url('/uploads/',$data->image)}}" width="80" class="mx-auto mt-5" alt="...">
          <div class="card-body">
            <h5 class="card-title">Orphan details</h5>
            
            <p class="card-text"> <strong>Name</strong>:    {{$data->name}}</p>
            <p class="card-text"> <strong>Age</strong>:     {{$data->age}}</p>
            <p class="card-text"> <strong>Gender</strong>:  {{$data->gender}}</p>
            <p class="card-text"> <strong>Status</strong>:  {{$data->status}}</p>
            <p class="card-text"> <strong>Image</strong>:   {{$data->image}}</p>
            
            <a href="{{route('adopt.now',$data->id)}}" class="btn btn-primary">Adopt Now</a>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>



@endsection