@extends('backend.master')



@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-sm-6 mb-4">
            <div class="card">
                <img src="{{url('/uploads/',$staff->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Staffs details</h5>

                    <p class="card-text"> Name: {{$staff->name}}</p>
                    <p class="card-text"> Address: {{$staff->address}}</p>
                    <p class="card-text"> Phone_number: {{$staff->phone_number}}</p>
                    <p class="card-text"> Image: {{$staff->image}}</p>
                       
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
