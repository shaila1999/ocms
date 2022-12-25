@extends('frontend.master')


@section('content')

<div class="container">
    <h1 class="h1">Donors Information</h1>
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
                    <label for="" class="font-weight-bold">Enter Donor Phone_Number</label>
                    <input value="{{old('phone')}}" required name="phone" type="number" class="form-control" placeholder="Enter donor Phone ">

                </div>

                <div class="form-group my-3">
                    <label for="" class="font-weight-bold">Gender</label>
                    <select name="gender" class="form-select" aria-label="Default select example">
                        <option selected value="none">Open this select menu</option>
                        <option value="female" {{old('gender')=='female'?'selected':''}} >Female</option>
                        <option value="male" {{old('gender')=='male'?'selected':''}}> Male</option>
                        <option value="others" {{old('gender')=='others'?'selected':''}} >others</option>
                    </select>

                </div>


                <input value="{{Session::get('user_id')}}" type="hidden" name="user_id">


                <div class="form-group my-3">
                    <label for="image" class="font-weight-bold">Upload Image</label>
                    <input required name="image" type="file" class="form-control" id="image">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection
