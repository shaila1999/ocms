@extends('frontend.master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 py-3">
    <h1 class="h1">Orphans List</h1>
    </div>
   
    @foreach($orphan as $data)
    <div class="col-md-4 col-lg-3 col-sm-6 mb-4">
      <div class="card pt-4 ">
        <div class="image mx-auto" style="height: 150px; width: 120px; overflow: hidden;">
          <img src="{{url('/uploads/',$data->image)}}" class="img-responsive" style="height: 150px; width: 120px;" alt="...">
        </div>
        <div class="card-body text-center">            
            <p class="card-text" style="font-size: 20px; color: #342a6a;  font-weight: 800;">{{$data->name}}</p>
            <p class="card-text"> <strong>Age</strong>:     {{$data->age}}</p>
            <p class="card-text"> <strong>Gender</strong>:  {{$data->gender}}</p>
            <p class="card-text"> <strong>Status</strong>:  {{$data->status}}</p>
            
              @if($data->status != "adopt")
                <a href="{{route('adopt.orphan',$data->id)}}" class="btn btn-primary">Adopt Now</a>   
              @else
              <a disabled class="btn btn-success text-white">Already adopted</a>          
              @endif
            
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>



@endsection