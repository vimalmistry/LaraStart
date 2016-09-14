@extends('layouts.auth')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default auth">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="notice notice-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form role="form" method="POST" action="{{ url('/password/email') }}" data-toggle="validator">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            <span class="help-block with-errors"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        <div class="form-group">
                            <label for="" class="control-label">Captcha</label>
                                <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>

                                @if(Session::has('capcha_error'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ Session::get('capcha_error') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Send Password Reset Link
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
