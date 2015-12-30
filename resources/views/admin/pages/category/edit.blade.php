@extends('admin.layouts.boxed')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            {{ $category->name }}
            <small>update category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/product') }}">Categories</a></li>
            <li class="active"><a href="#">{{ $category->name }}</a></li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">

        @include('admin.pages.category._form', ['category' => $category, 'options' => ['url' => 'admin/category/' . $category->id, 'method' => 'PUT']])

    </div>
@stop

