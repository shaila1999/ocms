@extends('frontend.master')


@section('content')

<div class="container">
<h1 class="h1" >Donors Information</h1>
    <div class="row">
        <div class="col-12 col-md-6">
        <form action="{{route('donor.info')}}" method="post" enctype="multipart/form-data">
    
@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf
        <div class="form-group my-3">
            <label for="">Enter Donor Phone_Number</label>
            <input required name="phone" type="number" class="form-control"  placeholder="Enter donor Phone ">

        </div>

         <div class="form-group my-3">
            <label for="">Gender</label>
            <input name="gender" type="text" class="form-control"  placeholder="Enter gender ">
        </div>

        <input value="{{Session::get('id')}}" type="hidden" name="user_id">


         <div class="form-group my-3">
            <label for="image">Upload Image</label>
            <input name="image"  type="file" class="form-control" id="image">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

        </div>
    </div>
</div>

@endsection