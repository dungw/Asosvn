@extends('admin.layouts.boxed')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            {{ $brand->name }}
            <small>update brand</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/brand') }}">Brands</a></li>
            <li class="active"><a href="#">{{ $brand->name }}</a></li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">

        @include('admin.pages.brand._form', ['brand' => $brand, 'options' => ['url' => 'admin/brand/' . $brand->id, 'method' => 'PUT', 'files' => true]])

    </div>
@stop

