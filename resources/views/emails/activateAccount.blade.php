@extends('emails.layout')


@section('content')

{{ Lang::get('auth.clickHereActivate') }}
<a href="{{ url('activate/'.$code) }}" >
    {{ url('activate/') }}
</a>


@stop