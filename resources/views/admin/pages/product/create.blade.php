@extends('admin.layouts.boxed')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Product
            <small>create product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/product') }}">Products</a></li>
            <li class="active"><a href="#">Create product</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="box">

        <div class="box-body">

            @include('admin.pages.product._form', ['options' => ['url' => 'admin/product', 'files' => true]])

        </div>

    </div>
@stop

