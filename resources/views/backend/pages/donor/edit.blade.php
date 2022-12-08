@extends('backend.master')




@section('content')
<h1>Update Donor</h1>
<form action="{{route('donor.update',$donor->id)}}" method="post" enctype="multipart/form-data">
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
            <label for="name">Enter Donor Name</label>
            <input value="{{$donor->name}}" required name="name" type="text" class="form-control" id="name" placeholder="Enter donor Name">
        </div>

        <div class="form-group my-3">
            <label for="name">Description</label>
            <textarea class="form-control" name="description" id=""></textarea>
        </div>
        
        <div class="form-group my-3">
            <label for="">Enter Donor Address</label>
            <input value="{{$donor->address}}" name="address" type="text" class="form-control"  placeholder="Enter donor address ">

        </div>

        <div class="form-group my-3">
            <label for="">Enter Donor Phone_Number</label>
            <input value="{{$donor->phone}}" required name="phone" type="number" class="form-control"  placeholder="Enter donor Phone ">

        </div>

         <div class="form-group my-3">
            <label for="">Enter Donor Email</label>
            <input value="{{$donor->email}}" name="email" type="text" class="form-control"  placeholder="Enter donor email ">

        </div>

         <div class="form-group my-3">
            <label for="image">Upload Image</label>
            <input name="image"  type="file" class="form-control" id="image">
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>







@endsection     


