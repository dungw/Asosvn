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
            <li><a href="{{ url('admin/order') }}">Order</a></li>
            <li class="active"><a href="#">Order list</a></li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">
        <div class="box-body">

            <div class="pull-left">
                <div class="dropdown inline">
                    <button class="btn btn-default dropdown-toggle" type="button" id="filterStatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        All Status
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filterStatus">
                        <li><a href="#">Pending</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Deposit</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Processing</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Shipping</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Complete</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Canceled</a></li>
                    </ul>
                </div>
                <div class="dropdown inline">
                    <button class="btn btn-default dropdown-toggle" type="button" id="filterType" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        All Type
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filterType">
                        <li><a href="#">Normal</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Custom</a></li>
                    </ul>
                </div>
            </div>


            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <button class="btn btn-warning">Details</button>
                            {!! App\Helpers\MyHtml::btnEdit('admin/order/' . $order->id . '/edit/') !!}
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

