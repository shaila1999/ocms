@extends('frontend.master')
@section('content')
<div class="container mx-auto my-5">


    <form action="" method="post">
    @csrf

        <div class="form-group">
            <label for="name"> Donor Name</label>
            <input required name="donor_name" type="text" class="form-control" id="name" placeholder="name">
        </div>

        <div class="form-group my-3">
            <label for="name">Donar Amount</label>
            <input  name="donor_amount" type="number" class="form-control" id="donor_amount" placeholder="donor_amount">
        </div>   
        <div class="form-group">
            <label for="email"> Donor email</label>
            <input required name="donor_email" type="email" class="form-control" id="email" placeholder="email">
        </div>

        <div class="form-group">
            <label for="name"> Donor Belongings</label>
            <input  name="donor_belonging" type="text" class="form-control" id="name" placeholder="belonging">
        </div>


        <div class="form-group my-3">
            <label for="phone-number">Phone number</label>
            <input required name="phone_number" type="number" class="form-control" id="number" placeholder="phone-Number">
        </div>

        <button type="submit" class="btn btn-primary">Donate now</button>

  </form>

</div>
@endsection