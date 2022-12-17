@extends('backend.master')



@section('content')

<h1>Adopt List</h1>
@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if(session()->has('error'))
<p class="alert alert-danger">{{session()->get('error')}}</p>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Orphan Id</th>
            <th scope="col">Parent Id</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>


        </tr>
    </thead>
    <tbody>
        @foreach($adopt as $data)
        <tr>
            <th scope="row">{{($data->id)}}</th>
            <td>{{($data->orphan_id)}}</td>
            <td>{{($data->parent_id)}}</td>
            <td>{{($data->status)}}</td>

            <td>
                <a href="{{route('adoption.approve',$data->id)}}" class="btn btn-primary">Approve</a>
                <a href="{{route('adoption.reject',$data->id)}}" class="btn btn-danger">Reject</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{$adopt->links()}}

@endsection
