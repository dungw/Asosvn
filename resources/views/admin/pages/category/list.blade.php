@extends('admin.layouts.boxed')

@section('head')
    <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Category
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/category') }}">Categories</a></li>
            <li class="active"><a href="#">Category list</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Category list</h3>
        </div>
        <div class="box-body">

            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Order</th>
                    <th width="15%">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ '' }}</td>
                        <td>{{ $category->order }}</td>
                        <td>
                            <a href="{{ url('admin/category/' . $category->id . '/edit') }}" class="btn btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            {!! Form::open(['url' => 'admin/category/' . $category->id, 'method' => 'DELETE', 'class' => 'inline']) !!}
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm pull-right">
                                <i class="fa fa-remove"></i> Delete
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('footer-content')
    <script src="{{ asset('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#data-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

    @if (Session::has('success'))
        <script type="text/javascript"> $.growl.notice({ message: "{{ Session::get('success') }}" }); </script>
    @endif

@endsection

