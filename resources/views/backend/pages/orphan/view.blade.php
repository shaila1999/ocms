@extends('backend.master')



@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-sm-6 mb-4">
            <div class="card">
                <img src="{{url('/uploads/',$orphan->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Orphan details</h5>

                    <p class="card-text">Orphan Name: {{$orphan->name}}</p>
                    <p class="card-text">Orphan Age: {{$orphan->age}}</p>
                    <p class="card-text">Orphan Gender: {{$orphan->gender}}</p>
                    <p class="card-text">Orphan Status: {{$orphan->status}}</p>
                    <p class="card-text">Orphan Image: {{$orphan->image}}</p>    
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
