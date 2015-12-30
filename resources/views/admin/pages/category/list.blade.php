@extends('admin.layouts.boxed')

@section('head')
    <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@stop

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Category
            <small>listing</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/category') }}">Categories</a></li>
            <li class="active"><a href="#">Category list</a></li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">
        <div class="box-body">

            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Order</th>
                    <th width="15%">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($parents as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td></td>
                        <td>{{ $category->order }}</td>
                        <td>
                            {!! App\Helpers\MyHtml::btnEdit('admin/category/' . $category->id . '/edit/') !!}
                            {!! App\Helpers\MyHtml::btnRemove('admin/category/' . $category->id) !!}
                        </td>
                    </tr>

                    @foreach ($category->children()->orderBy('name')->get() as $child)
                        <tr>
                            <td>{{ $child->id }}</td>
                            <td>{{ '-- ' . $child->name }}</td>
                            <td>{{ $child->slug }}</td>
                            <td>{{ $category->name or null }}</td>
                            <td>{{ $child->order }}</td>
                            <td>
                                {!! App\Helpers\MyHtml::btnEdit('admin/category/' . $child->id . '/edit/') !!}
                                {!! App\Helpers\MyHtml::btnRemove('admin/category/' . $child->id) !!}
                            </td>
                        </tr>

                        @foreach ($child->children()->orderBy('name')->get() as $grandson)
                            <tr>
                                <td>{{ $grandson->id }}</td>
                                <td>{{ '---- ' . $grandson->name }}</td>
                                <td>{{ $grandson->slug }}</td>
                                <td>{{ $child->name or null }}</td>
                                <td>{{ $grandson->order }}</td>
                                <td>
                                    {!! App\Helpers\MyHtml::btnEdit('admin/category/' . $grandson->id . '/edit/') !!}
                                    {!! App\Helpers\MyHtml::btnRemove('admin/category/' . $grandson->id) !!}
                                </td>
                            </tr>
                        @endforeach

                    @endforeach

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop

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
                "autoWidth": false,
                "order": []
            });
        });
    </script>

    @if (Session::has('success'))
        <script type="text/javascript"> $.growl.notice({ message: "{{ Session::get('success') }}" }); </script>
    @endif

@stop

