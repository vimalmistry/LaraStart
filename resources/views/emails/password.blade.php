
@extends('emails.layout')



@section('content')


    <b>Click here to reset your password:</b>
    <p>
        <a href="{{ url('password/reset/'.$token) }}" >

            Click Here

        </a>


    </p>
    @stop