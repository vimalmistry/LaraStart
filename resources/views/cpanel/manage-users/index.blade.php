@extends('layouts.cpanel')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Permissions</div>

                <div class="panel-body">

                   <p><a href="{!! url('cpanel/manage-users/create') !!}" class="btn btn-success">Create Permission</a>

                   </p>  <br>

                    <table class="table table-bordered" id="users-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>


@stop

@section('ExtraHeader')
    {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">--}}

    <link rel="stylesheet" href="{{ asset("/adminlte/plugins/datatables/dataTables.bootstrap.css") }}">
@stop

@section('ExtraFooter')


    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset("/adminlte/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- App scripts -->

    <script>

        $(document).ready(function() {

            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url('cpanel/manage-users/data') !!}',

                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

@stop