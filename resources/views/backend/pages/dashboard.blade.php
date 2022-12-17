@extends('backend.master')

@section('content')

<div class="container-fluid">
    <h1 class="mb-4">Welcome to {{auth()->user()->name}}</h1>

    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Orphans</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class=" text-white stretched-link" href="{{route('orphans')}}">{{sizeof($orphans->all())}}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Total Parents</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class=" text-white stretched-link" href="{{route('user.list')}}">{{sizeof($parents)}}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Total Donors</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class=" text-white stretched-link" href="{{route('user.list')}}">{{sizeof($donors)}}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Total Donation</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('donations')}}">{{$total_donations}}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">Total Staffs</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link"
                        href="{{route('staff.list')}}">{{sizeof($staffs->all())}}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Total Expense</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('expense.list')}}">{{$total_expenses}}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>

        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">Pending user Request</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('user.list')}}">{{sizeof($pending_req)}}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

    </div>

    
    <div class="row">
        <div class="col-md-6">
            <h4>Pending Request</h4>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($pending_req as $key=>$data)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{($data->name)}}</td>
                        <td>{{($data->role)}}</td>
                        <td>{{($data->status)}}</td>
                        

                        <td> <a href="{{route('user.active',$data->id)}}" class="btn btn-primary">Active</a></td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="col-md-6">
            <h4>Recent Donor List</h4>
            <table class="table table-success">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donorlist as $key=> $data)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{($data->name)}}</td>
                        <td>{{($data->address)}}</td>
                        <td>{{($data->phone_number)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h4>Recent Donation</h4>
            <table class="table table-danger">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($donationlist as $key=> $data)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{($data->name)}}</td>
                        <td>{{($data->amount)}}</td>
                        <td>{{($data->transaction_id)}}</td>
                        <td>{{($data->phone_number)}}</td>
                    </tr>
                @endforeach

                    
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
                <h4>Recent Expense</h4>
            <table class="table table-warning">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Expense Type</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Purpose</th>
                    </tr>
                </thead>
                <tbody>
                
                @foreach($expenses as $key=> $data)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{($data->type)}}</td>
                        <td>{{($data->amount)}}</td>
                        <td>{{($data->purpose)}}</td>
                        
                    </tr>
                @endforeach

                    
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection
