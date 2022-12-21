@extends('backend.master')




@section('content')
<h1 class="h1">Update Staff</h1>
<form action="{{route('staff.update',$staff->id)}}" method="post" enctype="multipart/form-data">
@method('put')
    
    @if($errors->any())
        @foreach($errors->all() as $message)
        <p class="alert alert-danger">{{$message}}</p>
        @endforeach
        @endif
        
        
        @if(session()->has('message'))
            <p class="alert alert-success">{{session()->get('message')}}</p>
        @endif


     @csrf
    
            <div class="form-group my-3">
                <label for="name">Enter Staff Name</label>
                <input value="{{$staff->name}}" required name="staff_name" type="text" class="form-control" id="name" placeholder="Enter staff Name">
            </div>
    
    
            <div class="form-group my-3">
                <label for="">Enter staff Address</label>
                <input required value="{{$staff->address}}" name="staff_address" type="text" class="form-control"  placeholder="Enter staff address ">
    
             </div>
    
            <div class="form-group my-3">
                <label for="">Enter staff Phone_Number</label>
                <input value="{{$staff->phone}}" required name="staff_phone" type="number" class="form-control"  placeholder="Enter staff Phone ">
    
             </div>
    
             <div class="form-group my-3">
                <label for="">Enter staff Email</label>
                <input value="{{$staff->mail}}" required name="staff_mail" type="email" class="form-control"  placeholder="Enter staff email ">
    
             </div>
    
             <div class="form-group my-3">
                <label for="image">Upload Image</label>
                <input required name="image"  type="file" class="form-control" id="image">
            </div>
    
    
            <button type="submit" class="btn btn-primary">Update</button>
        </form>





@endsection