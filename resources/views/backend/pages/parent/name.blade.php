@extends('frontend.master')

@section('content')

<div class="container">
    <h1 class="h1">Parents Information</h1>
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="{{route('parent.class')}}" method="post" enctype="multipart/form-data">

                @if($errors->any())
                @foreach($errors->all() as $message)
                <p class="alert alert-danger">{{$message}}</p>
                @endforeach
                @endif


                @csrf

                <div class="form-group my-3">
                    <label for="name"class="font-weight-bold">Enter Phone Number</label>
                    <input required name="phone" type="number" class="form-control" id="name" placeholder="Enter phone">
                </div>

                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Enter Annual Income</label>
                    <input name="income" type="text" class="form-control" placeholder="Enter annual income ">
                </div>

                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Enter National ID</label>
                    <input name="n_id" type="text" class="form-control" placeholder="Enter national id ">
                </div>

                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Gender</label>
                    <select name="gender" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>

                <div class="form-group my-3 mt-3">
                    <label for=""class="font-weight-bold">Enter Occupation</label>
                    <input name="occupation" type="text" class="form-control" placeholder="Enter occupation ">
                </div>

                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Enter Family Member</label>
                    <input name="family_member" type="text" class="form-control" placeholder="Enter family member ">
                </div>

                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Marital Status</label>
                    <select name="marital_status" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="married">Married</option>
                        <option value="unmarried">Unmarried</option>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Blood group</label>
                    <select name="blood_group" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="o+">O+</option>
                        <option value="o-">O-</option>
                        <option value="a+">A+</option>
                        <option value="a-">A-</option>
                        <option value="b+">B+</option>
                        <option value="ab+">AB+</option>
                        <option value="ab-">AB-</option>
                    </select>
                </div>


                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Adoption History</label>
                    <div class="">
                        <input name="adoption_history" class="" type="checkbox" value="yes" id="yes" checked>
                        <label class="form-check-label" for="yes">Yes</label>
                    </div>

                    <div class="form-check">
                        <input name="adoption_history" class="" type="checkbox" value="no" id="no">
                        <label class="form-check-label" for="no"> No</label>
                    </div>
                </div>

                <input value="{{Session::get('id')}}" type="hidden" name="user_id">


                <div class="form-group my-3">
                    <label for="image"class="font-weight-bold">Upload Image</label>
                    <input name="image" type="file" class="form-control" id="image">
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
