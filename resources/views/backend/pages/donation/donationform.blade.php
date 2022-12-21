@extends('backend.master')

@section('content')

<h1 class="h1" h1>Donation form</h1>
<form class="w-50" action="{{route('donation.donate')}}" method="post">

    @if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

    <div class="form-group my-3">
        <label for="name">Enter Amount </label>
        <input required name="amount" type="number" class="form-control" id="name" placeholder="Enter amount">
    </div>



    <div class="form-group my-3">
        <label for="">Donation Type</label>
        <select name="donation_type" class="form-select" aria-label="Default select example">
            <option selected value="none">Open this select menu</option>
            <option value="food">Food</option>
            <option value="clothes">Clothes</option>
            <option value="medicine">Medicine</option>
            <option value="education">Education</option>
            <option value="others">others</option>
        </select>
    </div>

    <div class="card p-3 bg-success text-white ">
        <h4 class="mb-4 text-warning  ">Our Marcent Numbers:</h4>
        <p><strong>Bkash:</strong> 01978987373</p>
        <p><strong>Nagad:</strong> 01978987372</p>
        <p><strong>Rocket:</strong> 019789873723</p>
    </div>


    <div class="form-group my-3">
        <label for="">Payment Option</label>
        <select name="payment" class="form-select" aria-label="Default select example">
            <option selected value="none">Open this select menu</option>
            <option value="bkash">Bkash</option>
            <option value="nagad">Nagad</option>
            <option value="rocket">Rocket</option>
        </select>
    </div>

    <input value="{{auth()->user()->id}}" type="hidden" name="user_id">



    <div class="form-group my-3">
        <label for="name">Enter Payment Phone Number</label>
        <input required name="phone" type="number" class="form-control" id="name"
            placeholder="Enter payment phone number">
    </div>





    <button type="submit" class="btn btn-primary">Submit</button>
</form>







@endsection
