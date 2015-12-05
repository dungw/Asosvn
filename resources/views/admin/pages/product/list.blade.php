@extends('admin.layouts.boxed')

@section('head')
    <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Product
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/product') }}">Products</a></li>
            <li class="active"><a href="#">Product list</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Product list</h3>
        </div>
        <div class="box-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Thumb.</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['category'] }}</td>
                        <td>{{ $product['thumbnail'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <td>
                            <a href="" class="btn btn-default btn-sm">Edit</a>
                            <a href="" class="btn btn-default btn-sm">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No product.</td>
                    </tr>
                @endforelse
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
@endsection

