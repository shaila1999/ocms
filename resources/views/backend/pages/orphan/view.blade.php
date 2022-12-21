@extends('backend.master')



@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-sm-6 mb-4 py-4">
            <div class="card">
                <img src="{{url('/uploads/',$orphan->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title fs-3">Orphan details</h5>

                    <p class="card-text"> <strong>Name:</strong>  {{$orphan->name}}</p>
                    <p class="card-text"><strong>Age:</strong> {{$orphan->age}}</p>
                    <p class="card-text"><strong>Gender:</strong> {{$orphan->gender}}</p>
                    <p class="card-text"><strong>Status:</strong> {{$orphan->status}}</p>
                        
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
