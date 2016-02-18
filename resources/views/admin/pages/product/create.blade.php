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
@stop

@section('content')
    <div class="box">

        <div class="box-body">

            <!-- Form Open -->
            {!! Form::open(array_merge(['url' => 'admin/product', 'files' => true], ['class' => 'form-horizontal'])) !!}

            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">

                    <li class="active"><a href="#tab_1" data-toggle="tab">{{ trans('lang.General Infos') }}</a></li>
                    <li><a href="#tab_2" data-toggle="tab">{{ trans('lang.Extra Attributes') }}</a></li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">

                        @include('admin.pages.product._form')

                    </div>

                    <div class="tab-pane" id="tab_2">

                        @include('admin.pages.product._attribute', ['attributes' => $attributes])

                    </div>

                </div>

            </div>

            <!-- Form Close -->
            {!! Form::close() !!}

        </div>

    </div>
@stop

