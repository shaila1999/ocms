@extends('frontend.master')




@section('content')

<div class="container mx-auto my-5" >  
    
<form action="{{route('parent.list')}}" method="post"> 

    @if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

        <div class="form-group my-3">
            <label for="name">Enter Parent Name</label>
            <input required name="parent_name" type="text" class="form-control" id="name" placeholder="Enter parent name">
        </div>

        <div class="form-group my-3">
            <label for="">Enter Parent Address</label>
            <input name="parent_address" type="text" class="form-control"  placeholder="Enter parent address ">
        </div>

        <div class="form-group my-3">
            <label for="">Enter Parent Phone_Number</label>
            <input required name="phone_number" type="digit" class="form-control"  placeholder="Enter phone number ">

         </div>

         <div class="form-group my-3">
            <label for="">Enter Parent Email</label>
            <input name="parent_email" type="text" class="form-control"  placeholder="Enter parent email ">

         </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>









@endsection