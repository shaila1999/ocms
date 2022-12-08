@extends('backend.master')



@section('content')


<h1>Update Orphan</h1>
<form action="{{route('orphan.update',$orphan->id)}}" method="post" enctype="multipart/form-data">
@method('put')


@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif


    @csrf

        <div class="form-group my-3">
            <label for="name">Enter Orphan Name</label>
            <input value="{{$orphan->name}}" required name="name" type="text" class="form-control" id="name" placeholder="Enter orphan Name">
        </div>
        
        <div class="form-group my-3">
            <label for="">Enter Orphan Age</label>
            <input value="{{$orphan->age}}" name="age" type="number" class="form-control"  placeholder="Enter orphan age ">

        </div>

        <div class="form-group my-3">
            <label for="">Gender</label>
         <select name="gender" class="form-select" aria-label="Default select example">
           <option selected>Open this select menu</option>
           <option value="male" {{($orphan->gender=='male')?'selected':''}}>Male</option>
           <option value="female" {{($orphan->gender=='female')?'selected':''}}>Female</option>
           <option value="others" {{($orphan->gender=='others')?'selected':''}}>Others</option>
         </select>
        </div>
        

        <div class="form-group my-3">
             <label for="">Enter Orphan Status</label>
            <select name="status" id="" class="form-control">
                <option value="adopted" {{($orphan->status=='adopted')?'selected':''}}>Adopted</option>
                <option value="not adopted" {{($orphan->status=='not adopted')?'selected':''}}>Not adopted</option>
            </select>
        </div>

         <div class="form-group my-3">
            <label for="image">Upload Image</label>
            <input name="image"  type="file" class="form-control" id="image">
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>






@endsection