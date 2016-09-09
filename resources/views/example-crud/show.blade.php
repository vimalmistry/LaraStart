@extends('layouts.app')

@section('content')
<div class="container">

    <h1>ExampleCrud {{ $examplecrud->id }}
        <a href="{{ url('example-crud/' . $examplecrud->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ExampleCrud"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['examplecrud', $examplecrud->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete ExampleCrud',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $examplecrud->id }}</td>
                </tr>
                
            </tbody>
        </table>
    </div>

</div>
@endsection
