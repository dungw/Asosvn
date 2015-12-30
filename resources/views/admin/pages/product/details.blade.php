@extends('admin.layouts.boxed')

@section('head')
    <link type="text/css" href="{{ asset('css/amazingslider-1.css') }}">
@stop

@section('breadcrumb')
    <section class="content-header">
        <h1>
            {{ $product->name }}
            <small>details product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/product') }}">Products</a></li>
            <li class="active"><a href="#">{{ $product->name }}</a></li>
        </ol>
    </section>
@stop

@section('content')

    <div class="box">

        <div class="box-body">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li class="active"><a href="#tab_1" data-toggle="tab">General Infos</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Images</a></li>
                    <li class="pull-right"><a href="{{ url('admin/product/' . $product->id . '/edit/') }}" class="font14"><i class="fa fa-edit"></i> Edit</a></li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">

                        <div class="form-horizontal">
                            {!! App\Helpers\MyHtml::show('Name', $product->name) !!}
                            {!! App\Helpers\MyHtml::show('Sku', $product->sku) !!}
                            {!! App\Helpers\MyHtml::show('Slug', $product->slug) !!}
                            {!! App\Helpers\MyHtml::show('Category', $product->category->name) !!}
                            {!! App\Helpers\MyHtml::show('Brand', $product->brand->name) !!}
                            {!! App\Helpers\MyHtml::showMultiple('Distributor', $product->distributors()->get()) !!}
                            {!! App\Helpers\MyHtml::show('Price', number_format($product->price, 0)) !!}
                            {!! App\Helpers\MyHtml::show('Condition', $product->condition) !!}
                            {!! App\Helpers\MyHtml::show('Quantity', $product->quantity) !!}
                            {!! App\Helpers\MyHtml::show('Description', $product->description, 'border-none') !!}
                        </div>

                    </div>

                    <div class="tab-pane" id="tab_2">
                        {!! App\Helpers\MyHtml::productImageSlider($product->id, $product->images()->get()) !!}
                    </div>

                </div>

            </div>

        </div>

    </div>

@stop

@section('footer-content')
    <script type="text/javascript" src="{{ asset('js/amazingslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/initslider-1.js') }}"></script>
@stop
