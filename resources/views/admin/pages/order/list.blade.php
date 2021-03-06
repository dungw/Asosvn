@extends('admin.layouts.boxed')

@section('head')
    <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@stop

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Order
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
                        <span> {{ $status or 'All' }}</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filterStatus">
                        <li><a href="{{ url('admin/order') }}">All</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('admin/order/status/pending') }}">Pending</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('admin/order/status/deposit') }}">Deposit</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('admin/order/status/processing') }}">Processing</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('admin/order/status/shipping') }}">Shipping</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('admin/order/status/complete') }}">Complete</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('admin/order/status/canceled') }}">Canceled</a></li>
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
                        <th width="10%">Actions</th>
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
                            <button class="btn btn-warning" onclick="$.showOrderDetail('{{ $order->id }}')">Details</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="modal-order-detail"></div>
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

            var url = '{{ Config::get('app.url')}}';
            $.showOrderDetail = function(orderId) {
                $.get(url+ 'admin/order/' + orderId, function(data) {
                    $("#modal-order-detail").html(data);
                    $(".order-details").modal('show');
                });
            };
        });
    </script>

    @if (Session::has('success'))
        <script type="text/javascript"> $.growl.notice({ message: "{{ Session::get('success') }}" }); </script>
    @endif

@stop

