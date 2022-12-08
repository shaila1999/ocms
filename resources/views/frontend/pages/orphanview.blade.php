@extends('frontend.master')



@section('content')


<div class="card" style="width: 18rem;">
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

@endsection