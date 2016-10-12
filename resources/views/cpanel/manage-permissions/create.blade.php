@extends('layouts.cpanel')


@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default">

                <div class="panel-heading">Create Permission</div>

                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="notice notice-danger">
                            <ul>
                                Please check form and resubmit.
                                {{--@foreach ($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                            </ul>
                        </div>
                    @endif


                    {!! Form::open() !!}

                    {!! Form::formField('name','Permission Name',null,['id'=>'test'])  !!}


                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">

                        {!! Form::label('slug','Permission Slug',['class'=>'control-label']) !!}

                        {!! Form::number('slug',null,['class'=>'form-control']) !!}

                        @if ($errors->has('slug'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                        @endif


                    </div>

                        {!! Form::formField('description','Description',null,['id'=>'test'])  !!}


                        <div class="form-group">

                        {!! Form::submit('Create Pemission',['class'=>'btn btn-primary']) !!}
                    </div>


                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>


@endsection