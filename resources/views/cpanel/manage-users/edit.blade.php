@extends('layouts.cpanel')


@section('content')

    <div class="row">

        <div class="col-md-4">

            {{--<div class="well">--}}
                {{--<pre>--}}
                    {{--{!! print_r(json_encode($user,JSON_PRETTY_PRINT)) !!}--}}
                {{--</pre>--}}
            {{--</div>--}}

            <div class="panel panel-default">
                <div class="panel-heading">Edit User : {{$user->name}}</div>
                <div class="panel-body">

                    <div class="text-center">
                    <img src="{!! asset('uploads/'.$user->avatar) !!}" alt="{{$user->name}}">
                    </div>
                    <hr>
                    
                    @if (count($errors) > 0)
                        <div class="notice notice-danger">
                            <strong>Oops! : </strong>
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

                    {!! Form::model($user) !!}
                    {{--<form data-toggle="validator" role="form" method="POST" action="{{ url('/login') }}">--}}
                    {{ csrf_field() }}


                        {{--Email--}}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>
                        {!! Form::email('email',null,['class'=>'form-control required readonly']) !!}
                        <span class="help-block with-errors"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>


                        {{--Name--}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name</label>
                            {!! Form::text('name',null,['class'=>'form-control required']) !!}
                            <span class="help-block with-errors"></span>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>


                        {{--Gender--}}
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="control-label">Gender</label>
                            {!! Form::select('gender',['male','female'],null,['class'=>'form-control required']) !!}
                            <span class="help-block with-errors"></span>
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                            @endif
                        </div>



                        {{--Birthday--}}
                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="control-label">Birthday</label>
                            {!! Form::text('birthday',null,['class'=>'form-control required']) !!}
                            <span class="help-block with-errors"></span>
                            @if ($errors->has('birthday'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('birthday') }}</strong>
                            </span>
                            @endif
                        </div>


                        {{--Country--}}
                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="control-label">Country</label>
                            {!! Form::select('country',$countries,null,['class'=>'form-control required']) !!}
                            <span class="help-block with-errors"></span>
                            @if ($errors->has('country'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                            </span>
                            @endif
                        </div>



                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Update User
                        </button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>


@stop