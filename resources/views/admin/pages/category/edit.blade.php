@extends('admin.layouts.boxed')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Product
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/product') }}">Products</a></li>
            <li class="active"><a href="#"></a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Update: </h3>
        </div>

        @include('admin.pages.category._form', ['category' => $category, 'options' => ['url' => 'admin/category/' . $category->id, 'method' => 'PUT']])

    </div>
@stop

