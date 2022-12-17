@extends('frontend.master')




@section('content')

<form action="{{route('adopt.orphan',$orphan->id)}}" method="post">

    @if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf


    <div class="form-group my-3">
        <label for="">Adoption Status</label>
        <select name="status" id="" class="form-select">
            <option value="pending">Pending</option>


        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection
