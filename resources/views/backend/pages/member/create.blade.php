@extends('backend.master')

@section('content')


<form action="{{route('member.access')}}" method="post" enctype="multipart/form-data">      

@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif 


    @csrf

        <div class="form-group">
            <label for="name">Enter Member Name</label>
            <input required name="name" type="text" class="form-control" id="name" placeholder="Enter member name">
        </div>

       
        <div class="form-group">
            <label for="name">Enter Member Address</label>
            <input name="address" type="text" class="form-control" id="name" placeholder="Enter member address">
        </div>

        
        <div class="form-group">
            <label for="">Enter Member Phone_Number</label>
            <input required name="phone" type="number" class="form-control"  placeholder="Enter member phone ">

         </div>

         <div class="form-group">
             <label for="">Enter Member Status</label>
            <select name="status" id="" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>


         <div class="form-group">
            <label for="">Enter Donation Amount</label>
            <input name="donation" type="number" class="form-control"  placeholder="Enter donation amount ">

         </div>

         <div class="form-group">
            <label for="">Enter Member Email</label>
            <input name="email" type="text" class="form-control"  placeholder="Enter member email ">

        </div>

         <div class="form-group">
            <label for="image">Upload Image</label>
            <input name="image"  type="file" class="form-control" id="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    
@endsection