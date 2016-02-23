@extends('admin.layouts.boxed')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            {{ $category->name }}
            <small>update category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/category') }}">Categories</a></li>
            <li class="active"><a href="#">{{ $category->name }}</a></li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">

        <div class="box-body">

            <!-- Form Open -->
            {!! Form::open(array_merge(['url' => 'admin/category/' . $category->id, 'method' => 'PUT'], ['class' => 'form-horizontal'])) !!}

            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">

                    <li class="active"><a href="#tab_1" data-toggle="tab">{{ trans('lang.general_infos') }}</a></li>
                    <li><a href="#tab_2" data-toggle="tab">{{ trans('lang.extra_attributes') }}</a></li>
                    <li class="pull-right">
                        {!! App\Helpers\MyHtml::submit(trans('lang.submit_update'), ['class' => 'btn btn-primary']) !!}
                    </li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">
                        @include('admin.pages.category._form', ['category' => $category])
                    </div>

                    <div class="tab-pane" id="tab_2">
                        @include('admin.pages.category._attribute', ['attributes' => isset($attributes) ? $attributes : []])
                    </div>

                </div>

            </div>

            <!-- Form Close -->
            {!! Form::close() !!}

        </div>

    </div>
@stop

