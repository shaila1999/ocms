@extends('backend.master')


@section('content')

<form action="{{route('staff.care')}}" method="post" enctype="multipart/form-data">
    
@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

        <div class="form-group">
            <label for="name">Enter Staff Name</label>
            <input required name="staff_name" type="text" class="form-control" id="name" placeholder="Enter staff Name">
        </div>

        <div class="form-group">
            <label for="">Enter staff Id</label>
            <input name="id" type="text" class="form-control"  placeholder="Enter staff id ">

         </div>

        
        <div class="form-group">
            <label for="">Enter staff Address</label>
            <input name="staff_address" type="text" class="form-control"  placeholder="Enter staff address ">

         </div>

        <div class="form-group">
            <label for="">Enter staff Phone_Number</label>
            <input required name="staff_phone" type="number" class="form-control"  placeholder="Enter staff Phone ">

         </div>

         <div class="form-group">
            <label for="">Enter staff Email</label>
            <input required name="staff_mail" type="text" class="form-control"  placeholder="Enter staff email ">

         </div>

         <div class="form-group">
            <label for="image">Upload Image</label>
            <input name="image"  type="file" class="form-control" id="image">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



@endsection