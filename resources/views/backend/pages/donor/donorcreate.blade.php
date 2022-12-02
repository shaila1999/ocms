@extends('backend.master')

@section('content')

<form action="{{route('donor.info')}}" method="post" enctype="multipart/form-data">
    
@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

        <div class="form-group">
            <label for="name">Enter Donor Name</label>
            <input required name="name" type="text" class="form-control" id="name" placeholder="Enter donor Name">
        </div>

        <div class="form-group">
            <label for="name">Description</label>
            <textarea class="form-control" name="description" id=""></textarea>
        </div>
        
        <div class="form-group">
            <label for="">Enter Donor Address</label>
            <input name="address" type="text" class="form-control"  placeholder="Enter donor address ">

        </div>

        <div class="form-group">
            <label for="">Enter Donor Phone_Number</label>
            <input required name="phone" type="number" class="form-control"  placeholder="Enter donor Phone ">

        </div>

         <div class="form-group">
            <label for="">Enter Donor Email</label>
            <input name="email" type="text" class="form-control"  placeholder="Enter donor email ">

        </div>

         <div class="form-group">
            <label for="image">Upload Image</label>
            <input name="image"  type="file" class="form-control" id="image">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>







@endsection