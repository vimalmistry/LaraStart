@extends('layouts.auth')

@section('content')


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default auth">
                <div class="panel-heading">{{ Lang::get('titles.home') }}</div>

                <div class="panel-body">
                    <p>An email was sent to {{ $email }} on {{ $date }}.</p>

                    <p>{{ Lang::get('auth.clickInEmail') }}</p>

                    <p><a href='{!! url('resend-email') !!}'>{{ Lang::get('auth.clickHereResend') }}</a></p>
                </div>
            </div>
        </div>
    </div>



@stop