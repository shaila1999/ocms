@extends('frontend.master')




@section('content')

<div class="container">
  <div class="row">
    <div class="col-12 py-3">
    <h1 class="h1">Parents List</h1>
    </div>
   
    @foreach($parent as $data)
        @if($data->role=='parent')
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="{{url('/frontend/img/user.png')}}" width="100" class="mx-auto mt-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Parent details</h5>
                    
                    <p class="card-text"> <strong>Name</strong>:    {{$data->name}}</p>
                    <p class="card-text"> <strong>Address</strong>: {{$data->address}}</p>
                    <p class="card-text"> <strong>Email</strong>:    {{$data->email}}</p>
                    <p class="card-text"> <strong>Role</strong>:     {{$data->role}}</p>
        
                </div>
            </div>
        </div>
        @endif
    @endforeach
  </div>
</div>



@endsection