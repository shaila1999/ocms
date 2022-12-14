@extends('frontend.master')




@section('content')

<div class="container">
  <div class="row">
    <div class="col-12 py-3">
    <h1 class="h1 mb-5">Parents List</h1>
    </div>
   
    @foreach($parent as $data)
        @if($data->role=='parent')
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
                <img src="{{url('/uploads/'.$data->image)}}" width="100" class="mx-auto mt-3" alt="...">
                <div class="card-body ">                    
                    <p class="card-text" style="font-size: 18px;"> <strong>Name</strong>:    {{$data->name}}</p>
                    <p class="card-text" style="font-size: 18px;"> <strong>Blood Group</strong>: {{$data->blood_group}}</p>
                    
                </div>
            </div>
        </div>
        @endif
    @endforeach
  </div>
</div>



@endsection