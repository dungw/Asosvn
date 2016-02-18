@extends('admin.layouts.boxed')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Product
            <small>create product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/blog') }}">Blogs</a></li>
            <li class="active"><a href="#">Create blog</a></li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">

        <div class="box-body">

            @include('admin.pages.cms.blog._form', ['options' => ['url' => 'admin/blog', 'files' => true]])

        </div>

    </div>
@stop

