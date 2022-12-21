@extends('backend.master')

@section('content')
<h1 class="h1">Donation Report</h1>

<form action="{{route('donation.report.search')}}" method="get">

<div class="row">
    <div class="col-md-4">
        <label for="">From date:</label>
        <input name="from_date" type="date" class="form-control">

    </div>
    <div class="col-md-4">
        <label for="">To date:</label>
        <input name="to_date" type="date" class="form-control">
    </div>
    <div class="col-md-4 pt-4">
        <button type="submit" class="btn btn-info">Search</button>
    </div>
</div>

</form>
<div id="donationReport">

<h1>Donation Reports- {{date('Y-m-d')}}</h1>
    <table class="table table-striped">
        <thead>
        <tr>
        <th scope="col"> Id</th>
        <th scope="col">User Id</th>
        <th scope="col"> Amount</th>
        <th scope="col"> Details</th>
        <th scope="col"> Phone Number</th>
        <th scope="col"> Payment Method</th>
        <th scope="col"> Transaction Id</th>

        </tr>
        </thead>
        <tbody>
        @if(isset($donate))
        @foreach($donate as $key=>$data)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{($data->user_id)}}</td>
            <td>{{($data->amount)}}</td>
            <td>{{($data->details)}}</td>
            <td>{{($data->phone_number)}}</td>
            <td>{{($data->payment_method)}}</td>
            <td>{{($data->transaction_id)}}</td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
</div>
<button onclick="printDiv('donationReport')" class="btn btn-success">Print</button>


<script>
    function printDiv(divId){
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection