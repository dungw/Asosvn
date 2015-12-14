@extends('admin.layouts.boxed')

@section('head')

@endsection

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Product
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/product') }}">Products</a></li>
            <li class="active"><a href="#">{{ $product->name }}</a></li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Product list</h3>
        </div>

        <div class="box-body">

            <div class="popup-gallery">
                @if (count($product->images()->get()))
                    @foreach ($product->images()->get() as $image)
                        <a href="{{ asset(\App\ProductImage::getContainerFolder($product->id)) . DIRECTORY_SEPARATOR . $image->image }}"
                           data-source="http://500px.com/photo/32736307" title="Into The Blue"
                           style="width:193px;height:125px;">
                            <img src="{{ asset(\App\ProductImage::getContainerFolder($product->id)) . DIRECTORY_SEPARATOR . \App\ProductImage::getThumb($image->image) }}">
                        </a>
                    @endforeach
                @endif
            </div>

        </div>

    </div>

@endsection

@section('footer-content')

@endsection
