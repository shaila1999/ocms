@extends('backend.master')

@section('content')
<form action="{{route('parent.class')}}" method="post"> 

    @if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

        <div class="form-group">
            <label for="name">Enter Parent Name</label>
            <input required name="parent_name" type="text" class="form-control" id="name" placeholder="Enter Parent Name">
        </div>

        <div class="form-group">
            <label for="name">Enter Parent ID</label>
            <textarea class="form-control" name="id" id=""></textarea>
        </div>

        
        <div class="form-group">
            <label for="">Enter Parent Address</label>
            <input name="parent_address" type="text" class="form-control"  placeholder="Enter parent address ">

         </div>

        <div class="form-group">
            <label for="">Enter Parent Phone_Number</label>
            <input required name="phone_number" type="digit" class="form-control"  placeholder="Enter Parent Phone ">

         </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    
@endsection




