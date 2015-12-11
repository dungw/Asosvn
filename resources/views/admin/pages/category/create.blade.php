@extends('admin.layouts.boxed')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Category
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/category') }}">Categories</a></li>
            <li class="active"><a href="#">Create category</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Create category</h3>
        </div>

        @include('admin.pages.category._form', ['options' => ['url' => 'admin/category']])

    </div>
@stop

