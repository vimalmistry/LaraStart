@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default auth">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        {{--@if (count($errors) > 0)--}}
                            {{--<div class="row">--}}
                                {{--<div class="form-group">--}}
                                    {{--<div class="col-sm-10 col-sm-offset-1">--}}
                                        {{--<div class="alert alert-danger">--}}
                                            {{--<strong>{{ Lang::get('auth.whoops') }}</strong> {{ Lang::get('auth.someProblems') }}--}}
                                            {{--<br/><br/>--}}


                                            {{--@if(Session::has('capcha_error'))--}}
                                                {{--<li>{{ Session::get('capcha_error') }}</li>--}}
                                            {{--@endif--}}

                                            {{--<ul>--}}
                                            {{--@foreach ($errors->all() as $error)--}}
                                            {{--<li>{{ $error }}</li>--}}
                                            {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}

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


                            <form role="form" data-toggle="validator" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Name</label>

                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" autofocus required>


                                <span class="help-block with-errors"></span>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>

                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required
                                            data-remote="{!! url('register/check') !!}"

                                           data-remote-error="User with this email exist."

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

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="control-label">Confirm Password</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>


                                <span class="help-block with-errors"></span>

                            @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            <div class="form-group">

                                <label for="" class="control-label">Captcha</label>


                                <div class="g-recaptcha" style="margin: auto" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>

                                    @if(Session::has('capcha_error'))
                                        <span class="help-block">
                                        <strong class="text-danger">{{ Session::get('capcha_error') }}</strong>
                                    </span>
                                    @endif

                            </div>


                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Register
                                    </button>
                                <a href="{!! url('login') !!}" class="btn btn-default btn-block">Already account? LogIn</a>

                            </div>

                            <p class="text-center">Or</p>

                            <div class="form-group">
                                {{--                                <a href="{!! route('social.redirect', ['provider' => 'facebook']) !!}" class="btn btn-block btn-social btn-facebook btn-flat no-pjax"><i class="fa fa-facebook"></i> Sign in with Facebook</a>--}}
                                {!! Html::link(route('social.redirect', ['provider' => 'facebook']), 'Login with Facebook', array('class' => 'btn btn-block btn-primary btn-facebook')) !!}
                                {{--                                    {!! Html::link(route('social.redirect', ['provider' => 'twitter']), 'Twitter', array('class' => 'btn btn-block btn-primary btn-block twitter')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => 'google']), 'Google +', array('class' => 'btn btn-lg btn-primary btn-block google')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => 'github']), 'GitHub', array('class' => 'btn btn-lg btn-primary btn-block github')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => 'youtube']), 'YouTube', array('class' => 'btn btn-lg btn-primary btn-block youtube')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => 'twitch']), 'Twitch', array('class' => 'btn btn-lg btn-primary btn-block twitch')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => 'instagram']), 'Instagram', array('class' => 'btn btn-lg btn-primary btn-block instagram')) !!}--}}
                                {{--{!! Html::link(route('social.redirect', ['provider' => '37signals']), 'Basecamp 37signals', array('class' => 'btn btn-lg btn-primary btn-block 37signals')) !!}--}}
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
