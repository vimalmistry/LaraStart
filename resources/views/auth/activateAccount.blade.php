@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Success</div>

                    {{--{{ Lang::get('titles.home') }}--}}
                    <div class="panel-body">
                        {{--<p>{{ Lang::get('auth.tooManyEmails',--}}
                        {{--['email' => $email] ) }}</p>--}}
                        We e-mailed you activation link. Please check your E-Mail.
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop