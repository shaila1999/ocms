@extends('backend.master')

@section('content')


<form action="{{route('member.access')}}" method="post" >      

@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif 


    @csrf

        <div class="form-group">
            <label for="name">Enter Member Name</label>
            <input required name="name" type="text" class="form-control" id="name" placeholder="Enter Member Name">
        </div>

        <div class="form-group">
            <label for="name">Enter Member Id</label>
            <input name="id" type="text" class="form-control" id="name" placeholder="Enter Id ">
        </div>

        

        <div class="form-group">
            <label for="name">Enter Member Address</label>
            <input name="address" type="text" class="form-control" id="name" placeholder="Enter Member Address">
        </div>

        

        <div class="form-group">
            <label for="">Enter Member Phone_Number</label>
            <input required name="phone" type="number" class="form-control"  placeholder="Enter Member Phone ">

         </div>

         <div class="form-group">
            <label for="">Enter Member Occupation</label>
            <input name="occupation" type="text" class="form-control"  placeholder="Enter Member occupation ">

           
         </div>

         <div class="form-group">
            <label for="">Enter Member Donation</label>
            <input name="donation" type="number" class="form-control"  placeholder="Enter Member Donation ">

         </div>

         <div class="form-group">
            <label for="image">Upload Image</label>
            <input name="image"  type="file" class="form-control" id="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    
@endsection