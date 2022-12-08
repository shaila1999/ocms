@extends('backend.master')

@section('content')

<form action="{{route('adopt.form')}}" method="post">
    
@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

     <div class="form-group my-3"> 
            <label for="name">Enter Parent Id</label>
            <input required name="parent_id" type="text" class="form-control" id="name" placeholder="Enter parent id">
        </div>


        <div class="form-group my-3"> 
            <label for="name">Enter Orphan Id</label>
            <input required name="orphan_id" type="text" class="form-control" id="name" placeholder="Enter orphan id">
        </div>
  
        
        <div class="form-group my-3">
             <label for="">Adoption Status</label>
            <select name="status" id="" class="form-select">
                <option value="pending">Pending</option>
                <option value="approve">Approve</option>
                
            </select>
        </div>


       

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

       
@endsection