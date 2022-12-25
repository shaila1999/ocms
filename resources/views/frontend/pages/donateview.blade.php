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
                    <input value="{{old('amount')}}" required name="amount" type="number" class="form-control" id="name" placeholder="Enter amount">
                </div>

                <div class="form-group my-3">
                    <label for="" class="font-weight-bold">Donation Type</label>
                    <select name="donation_type" class="form-select" aria-label="Default select example">
                        <option selected value="none">Open this select menu</option>
                        <option value="food" {{old('donation_type')=='food'?'selected':''}}>Food</option>
                        <option value="clothes" {{old('donation_type')=='clothes'?'selected':''}}>Clothes</option>
                        <option value="medicine" {{old('donation_type')=='medicine'?'selected':''}}>Medicine</option>
                        <option value="education" {{old('donation_type')=='education'?'selected':''}}>Education</option>
                        <option value="others" {{old('donation_type')=='others'?'selected':''}}>others</option>
                    </select>
                </div>

                
                <div class="form-group pt-3">                    
                    <div class="card p-3 mt-4 bg-success text-white ">
                        <h4 class="mb-4 text-white">Our Marcent Numbers:</h4>
                        <p><strong>Bkash:</strong> 01978987373</p>
                        <p><strong>Nagad:</strong> 01978987372</p>
                        <p><strong>Rocket:</strong> 019789873723</p>
                    </div>
                </div>

                <div class="form-group my-3">
                    <label for="" class="font-weight-bold">Payment Option</label>
                    <select name="payment" class="form-select" aria-label="Default select example">
                        <option selected value="none">Open this select menu</option>
                        <option value="bkash" {{old('payment')=='bkash'?'selected':''}}>Bkash</option>
                        <option value="nagad" {{old('payment')=='nagad'?'selected':''}}>Nagad</option>
                        <option value="rocket" {{old('payment')=='rocket'?'selected':''}}>Rocket</option>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label for="name"class="font-weight-bold">Enter Payment Phone Number</label>
                    <input value="{{old('payment_phone')}}" required name="payment_phone" type="text" class="form-control" id="name"
                        placeholder="Enter payment phone number">
                </div>

                <div class="form-group my-3">
                    <label for="name"class="font-weight-bold">Enter Transaction Id </label>
                    <input value="{{old('transaction_id')}}" required name="transaction_id" type="text" class="form-control" id="name"
                        placeholder="Enter transaction id">
                </div>


                <div class="form-group">
                    <label for="name"class="font-weight-bold">Enter Donor Name:</label>
                    <input value="{{old('donor_name')}}" required name="donor_name" type="text" class="form-control" id="name" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"class="font-weight-bold">Email address</label>
                    <input value="{{old('donor_email')}}" required name="donor_email" type="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Gender</label>
                    <select name="gender" class="form-select" aria-label="Default select example">
                        <option selected value="none">Open this select menu</option>
                        <option value="female" {{old('gender')=='female'?'selected':''}}>Female</option>
                        <option value="male" {{old('gender')=='male'?'selected':''}}>Male</option>
                        <option value="others" {{old('gender')=='others'?'selected':''}}>others</option>
                    </select>
                   
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"class="font-weight-bold">Address</label>
                    <input value="{{old('address')}}" required name="address" type="text" class="form-control" placeholder="address">
                </div>

                <div class="form-group my-3">
                    <label for=""class="font-weight-bold">Enter Donor Phone_Number</label>
                    <input value="{{old('phone')}}" required name="phone" type="text" class="form-control" placeholder="Enter donor Phone ">

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"class="font-weight-bold">Password</label>
                     <input value="{{old('donor_password')}}" required name="donor_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                 </div>

             
                <div class="form-group my-3">
                    <label for="image"class="font-weight-bold">Upload Image</label>
                    <input value="{{old('image')}}" required name="image" type="file" class="form-control" id="image">
                </div>

                <input type="hidden" value="donor" name="role">

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
