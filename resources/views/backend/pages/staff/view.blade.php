@extends('backend.master')



@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-sm-6 mb-4 py-3">
            <div class="card">
                <img src="{{url('/uploads/',$staff->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title fs-3">Staffs details</h5>

                    <p class="card-text"> <strong>Name: </strong> {{$staff->name}}</p>
                    <p class="card-text"><strong>Address:</strong>  {{$staff->address}}</p>
                    <p class="card-text"><strong>Phone_number:</strong>  {{$staff->phone_number}}</p>
                    
                       
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
