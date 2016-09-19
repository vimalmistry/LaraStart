@extends('layouts.admin')

@section('content')

    @if(!is_null($success))
        {{$success}}
    @endif


    @if(!is_null($fileName))
        {{$fileName}}
    @endif

    {!! Form::open(['enctype'=>'multipart/form-data']) !!}

    <div class="form-group">

        <lable class="control-label">
            Select Image
        </lable>

        {!! Form::file('image') !!}

    </div>

    <div class="form-group">

        {!! Form::submit('Upload') !!}

    </div>


    {!! Form::close() !!}

@endsection


