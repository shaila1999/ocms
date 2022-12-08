@extends('frontend.master')



@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 col-lg-4">
    <div class="card">
  <img src="{{url('/uploads/',$view->image)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Orphan details</h5>
    
    <p class="card-text">Orphan Name:    {{$view->name}}</p>
    <p class="card-text">Orphan Age:     {{$view->age}}</p>
    <p class="card-text">Orphan Gender:  {{$view->gender}}</p>
    <p class="card-text">Orphan Status:  {{$view->status}}</p>
    <p class="card-text">Orphan Image:   {{$view->image}}</p>
     
    <a href="{{route('adopt.now',$view->id)}}" class="btn btn-primary">Adopt Now</a>
  </div>
</div>

    </div>
  </div>
</div>


@endsection