@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Examplecrud <a href="{{ url('/example-crud/create') }}" class="btn btn-primary btn-xs" title="Add New ExampleCrud"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($examplecrud as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    
                    <td>
                        <a href="{{ url('/example-crud/' . $item->id) }}" class="btn btn-success btn-xs" title="View ExampleCrud"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/example-crud/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ExampleCrud"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/example-crud', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete ExampleCrud" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete ExampleCrud',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $examplecrud->render() !!} </div>
    </div>

</div>
@endsection
