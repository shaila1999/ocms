@extends('backend.master')




@section('content')

 <h1>Update Parent</h1>

<form action="{{route('parent.update',$parent->id)}}" method="post"> 
@method('put')

    @if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

        <div class="form-group my-3">
            <label for="name">Enter Parent Name</label>
            <input value="{{$parent->parent_name}}" required name="parent_name" type="text" class="form-control" id="name" placeholder="Enter parent name">
        </div>

        <div class="form-group my-3">
            <label for="">Enter Parent Address</label>
            <input value="{{$parent->parent_address}}" name="parent_address" type="text" class="form-control"  placeholder="Enter parent address ">
        </div>

        <div class="form-group my-3">
            <label for="">Enter Parent Phone_Number</label>
            <input value="{{$parent->phone_number}}" required name="phone_number" type="digit" class="form-control"  placeholder="Enter phone number ">

         </div>

         <div class="form-group my-3">
            <label for="">Enter Parent Email</label>
            <input value="{{$parent->parent_email}}" name="parent_email" type="text" class="form-control"  placeholder="Enter parent email ">

         </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    
@endsection








