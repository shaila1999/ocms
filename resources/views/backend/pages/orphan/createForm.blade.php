@extends('backend.master')


@section('content')

<h1 class="h1" h1>Orphans form</h1>
<form action="{{route('orphan.info')}}" method="post" enctype="multipart/form-data">

    @if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

    <div class="form-group my-3">
        <label for="name">Enter Orphan Name</label>
        <input required name="name" type="text" class="form-control" id="name" placeholder="Enter orphan name">
    </div>


    <div class="form-group my-3">
        <label for="name">Enter Orphan Age</label>
        <input required name="age" type="number" class="form-control" id="name" placeholder="Enter orphan age">
    </div>

    <div class="form-group my-3">
        <label for="">Orphan Status</label>
        <select name="status" id="" class="form-select">
            <option value="adopt">Adopt</option>
            <option value="not adopt">Not adopt</option>
        </select>
    </div>


    <div class="form-group my-3">
        <label for="">Gender</label>
        <select name="gender" class="form-select" aria-label="Default select example">
            <option selected value="none">Open this select menu</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="others">Others</option>
        </select>
    </div>


    <div class="form-group my-3">
        <label for="image">Upload Image</label>
        <input required name="image" type="file" class="form-control" id="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>










@endsection
