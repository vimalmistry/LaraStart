

@extends('emails.layout')


@section('content')


    <h4>Hello {{$name}},</h4>

    <p>
        Your Password Changed Successfully.
    </p>

    <p><a href="{{url('login')}}">Login</a></p>

@stop