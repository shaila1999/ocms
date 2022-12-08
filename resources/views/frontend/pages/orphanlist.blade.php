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
        <img src="{{url('/uploads/',$data->image)}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Orphan details</h5>
            
            <p class="card-text">Orphan Name:    {{$data->name}}</p>
            <p class="card-text">Orphan Age:     {{$data->age}}</p>
            <p class="card-text">Orphan Gender:  {{$data->gender}}</p>
            <p class="card-text">Orphan Status:  {{$data->status}}</p>
            <p class="card-text">Orphan Image:   {{$data->image}}</p>
            
            <a href="{{route('adopt.now',$data->id)}}" class="btn btn-primary">Adopt Now</a>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>



@endsection