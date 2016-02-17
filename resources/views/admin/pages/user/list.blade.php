@extends('admin.layouts.boxed')

@section('head')
<link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@stop

@section('breadcrumb')
<section class="content-header">
	<h1>
		User
		<small>listing</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
		<li><a href="{{ url('admin/user') }}">Users</a></li>
		<li class="active"><a href="#">User list</a></li>
	</ol>
</section>
@stop

@section('content')
<div class="box">
	<div class="box-body">

        <div class="pull-left">
            <div class="dropdown inline">
                <button class="btn btn-default dropdown-toggle" type="button" id="filterStatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span> {{ $type or 'All' }}</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="filterStatus">
                    <li><a href="{{ url('admin/user') }}">All</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('admin/user/register') }}">Register user</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('admin/user/social') }}">Social user</a></li>
                </ul>
            </div>
        </div>

		<table id="data-table" class="table table-bordered table-striped">
			<thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Address</th>
                </tr>
			</thead>
			<tbody>
			@foreach ($users as $user)
                <tr @if ($user->is_admin) class="success" @endif>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->address }}</td>
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

