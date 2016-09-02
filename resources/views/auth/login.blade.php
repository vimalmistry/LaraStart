@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>

                            <p class="text-center">Or</p>

                            <div class="form-group">
                                <div class="col-sm-5 col-sm-offset-4">
                                    {{--                                <a href="{!! route('social.redirect', ['provider' => 'facebook']) !!}" class="btn btn-block btn-social btn-facebook btn-flat no-pjax"><i class="fa fa-facebook"></i> Sign in with Facebook</a>--}}
                                    {!! Html::link(route('social.redirect', ['provider' => 'facebook']), 'Sign in with Facebook', array('class' => 'btn btn-block btn-primary btn-facebook')) !!}
                                    {!! Html::link(route('social.redirect', ['provider' => 'twitter']), 'Twitter', array('class' => 'btn btn-block btn-primary btn-block twitter')) !!}
                                    {{--{!! Html::link(route('social.redirect', ['provider' => 'google']), 'Google +', array('class' => 'btn btn-lg btn-primary btn-block google')) !!}--}}
                                    {{--{!! Html::link(route('social.redirect', ['provider' => 'github']), 'GitHub', array('class' => 'btn btn-lg btn-primary btn-block github')) !!}--}}
                                    {{--{!! Html::link(route('social.redirect', ['provider' => 'youtube']), 'YouTube', array('class' => 'btn btn-lg btn-primary btn-block youtube')) !!}--}}
                                    {{--{!! Html::link(route('social.redirect', ['provider' => 'twitch']), 'Twitch', array('class' => 'btn btn-lg btn-primary btn-block twitch')) !!}--}}
                                    {{--{!! Html::link(route('social.redirect', ['provider' => 'instagram']), 'Instagram', array('class' => 'btn btn-lg btn-primary btn-block instagram')) !!}--}}
                                    {{--{!! Html::link(route('social.redirect', ['provider' => '37signals']), 'Basecamp 37signals', array('class' => 'btn btn-lg btn-primary btn-block 37signals')) !!}--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
