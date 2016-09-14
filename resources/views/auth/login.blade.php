@extends('layouts.auth')


@section('ExtraHeader')

    {{--<script>--}}
        {{--$(document).ready(function () {--}}


        {{--});--}}
    {{--</script>--}}

@endsection

@section('content')
    <div class="container auth">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                {{--<h3 class="text-center">Login</h3>--}}


                <center>
                    <h1 class="text-info"><b>< OrSpot ></b></h1>
                </center>

                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="notice notice-danger">

                                <strong>Error : </strong>
                                Please check the form and resubmit.

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{--<ul>--}}
                                    {{--@foreach ($errors->all() as $error)--}}
                                        {{--<li>{{ $error }}</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            </div>
                        @endif



                        <form data-toggle="validator" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required
                                       {{--data-remote="{!! url('login/check') !!}"--}}
                                >
                                <span class="help-block with-errors"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="help-block with-errors"></span>
                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>

                                <a class="btn btn-default btn-block" href="{!! url('/register') !!}">
                                    Don't have an Account? Register.
                                </a>

                            </div>

                            {{--<p class="text-center">--}}
                            {{--<a class="" href="{{ url('/password/reset') }}">--}}
                            {{--Forgot Your Password?--}}
                            {{--</a></p>--}}

                            <p class="text-center">Or</p>

                            <div class="form-group text-center">

                                                                <a href="{!! route('social.redirect', ['provider' => 'facebook']) !!}" class="btn btn-social btn-facebook no-pjax"><i class="fa fa-facebook"></i> Sign in with Facebook</a>
{{--                                {!! Html::link(route('social.redirect', ['provider' => 'facebook']), '<i class="fa fa-facebook"></i> Login with Facebook', array('class' => 'btn btn-block btn-primary btn-facebook')) !!}--}}
                                {{--                                    {!! Html::link(route('social.redirect', ['provider' => 'twitter']), 'Twitter', array('class' => 'btn btn-block btn-primary btn-block twitter')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => 'google']), 'Google +', array('class' => 'btn btn-lg btn-primary btn-block google')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => 'github']), 'GitHub', array('class' => 'btn btn-lg btn-primary btn-block github')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => 'youtube']), 'YouTube', array('class' => 'btn btn-lg btn-primary btn-block youtube')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => 'twitch']), 'Twitch', array('class' => 'btn btn-lg btn-primary btn-block twitch')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => 'instagram']), 'Instagram', array('class' => 'btn btn-lg btn-primary btn-block instagram')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => '37signals']), 'Basecamp 37signals', array('class' => 'btn btn-lg btn-primary btn-block 37signals')) !!}--}}
                            </div>
                        </form>
                        <p class="text-center">
                            <a class="" href="{{ url('/password/reset') }}">
                                Forgot Your Password?
                            </a></p>


                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
