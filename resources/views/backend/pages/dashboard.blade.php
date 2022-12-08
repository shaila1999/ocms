@extends('backend.master')

@section('content')

<h1>Welcome to {{auth()->user()->name}}</h1>


 @endsection