@extends('frontend.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <h1 class="pt-3 h1">Donation form</h1>
            <form class="" action="{{route('donate.now')}}" method="post" enctype="multipart/form-data">

                @if($errors->any())
                @foreach($errors->all() as $message)
                <p class="alert alert-danger">{{$message}}</p>
                @endforeach
                @endif

                @csrf

                <div class="form-group my-3">
                    <label for="name" class="font-weight-bold">Enter Amount</label>
                    <input required name="amount" type="text" class="form-control" id="name" placeholder="Enter amount">
                </div>

                <div class="form-group my-3">
                    <label for="" class="font-weight-bold">Donation Type</label>
                    <select name="donation_type" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="food">Food</option>
                        <option value="clothes">Clothes</option>
                        <option value="medicine">Medicine</option>
                        <option value="education">Education</option>
                        <option value="others">others</option>
                    </select>
                </div>

                
                <div class="form-group pt-3">                    
                    <div class="card p-3 mt-4 bg-primary text-white ">
                        <h4 class="mb-4 text-white">Our Marcent Numbers:</h4>
                        <p><strong>Bkash:</strong> 01978987373</p>
                        <p><strong>Nagad:</strong> 01978987372</p>
                        <p><strong>Rocket:</strong> 019789873723</p>
                    </div>
                </div>

                <div class="form-group my-3">
                    <label for="" class="font-weight-bold">Payment Option</label>
                    <select name="payment" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="bkash">Bkash</option>
                        <option value="nagad">Nagad</option>
                        <option value="rocket">Rocket</option>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label for="name"class="font-weight-bold">Enter Payment Phone Number</label>
                    <input required name="payment_phone" type="number" class="form-control" id="name"
                        placeholder="Enter payment phone number">
                </div>

                <div class="form-group my-3">
                    <label for="name"class="font-weight-bold">Enter Transaction Id </label>
                    <input required name="transaction_id" type="text" class="form-control" id="name"
                        placeholder="Enter transaction id">
                </div>


                <div class="form-group">
                    <label for="name"class="font-weight-bold">Enter Donor Name:</label>
                    <input name="donor_name" type="text" class="form-control" id="name" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"class="font-weight-bold">Email address</label>
                    <input name="donor_email" type="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Gender</label>
                    <select name="gender" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="others">others</option>
                    </select>
                   
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"class="font-weight-bold">Address</label>
                    <input name="address" type="text" class="form-control" placeholder="address">
                </div>

                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Enter Donor Phone_Number</label>
                    <input required name="phone" type="number" class="form-control" placeholder="Enter donor Phone ">

                </div>

             
                <div class="form-group my-3">
                    <label for="image"class="font-weight-bold">Upload Image</label>
                    <input name="image" type="file" class="form-control" id="image">
                </div>

                <input type="hidden" value="donor" name="role">

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
