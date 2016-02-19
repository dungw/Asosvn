@extends('admin.layouts.boxed')

@section('head')
    <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@stop

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Product
            <small>listing</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/product') }}">Products</a></li>
            <li class="active"><a href="#">Product list</a></li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">
        <div class="box-body">

            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Subtitle</th>
                    <th width="10%">Preview</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                            <a href="{{ url('admin/blog/' . $blog->id . '/edit') }}">{{ $blog->title }}</a>
                        </td>
                        <td width="250px">
                            <a href="{{ url('admin/blog/' . $blog->id . '/edit') }}">
                                @if (file_exists(\App\Helpers\ImageManager::getContainerFolder('blog', $blog->image) . '/' . $blog->image))
                                    <img src="{{ asset(\App\Helpers\ImageManager::getContainerFolder('blog', $blog->image) . '/' . $blog->image) }}"
                                         width="242px" height="200px" alt="{{ $blog->title }}">
                                @else
                                    <img src="{{ asset(\App\ProductImage::NO_IMAGE) }}" width="242px" height="200px" alt=""/>
                                @endif
                            </a>
                        </td>
                        <td>{{ $blog->subtitle }}</td>
                        <td>
                            <a href="{{ url('blog/' . $blog->slug) }}" target="_blank">View</a>
                        </td>
                    </tr>
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

