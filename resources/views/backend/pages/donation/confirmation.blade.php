@extends('backend.master')
@section('content')

<h1 class="h1">Transaction confirmation</h1>
<form class="w-50" action="{{route('donation.payment')}}" method="post">
    @csrf

    <div class="form-group my-3">
        <label for="name">Enter Transaction Id </label>
        <input required name="transaction_id" type="text" class="form-control" id="name"
            placeholder="Enter transaction id">
    </div>

    <input type="hidden" name="donation_id" value="{{session()->get('id')}}">

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
