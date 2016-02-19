@extends('admin.layouts.boxed')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Blog
            <small>edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/blog') }}">Blogs</a></li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">

        <div class="box-body">

            <!-- Form Open -->
            {!! Form::open(array_merge(['url' => 'admin/blog/' . $blog->id, 'method' => 'PUT', 'files' => true], ['class' => 'form-horizontal'])) !!}

                @include('admin.pages.cms.blog._form', ['blog' => $blog])

            <!-- Form Close -->
            {!! Form::close() !!}

        </div>

    </div>
@stop

