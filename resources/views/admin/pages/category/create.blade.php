@extends('admin.layouts.boxed')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Category
            <small>create category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/category') }}">Categories</a></li>
            <li class="active"><a href="#">Create category</a></li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">

        @include('admin.pages.category._form', ['options' => ['url' => 'admin/category']])

    </div>
@stop

