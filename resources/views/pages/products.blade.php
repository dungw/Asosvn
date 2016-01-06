@extends('layouts.default')

@section('intermediate')
    @include('includes.default.advertisement')
@stop

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-3">
                    @include('includes.default.left-sidebar')
                </div>

                <div class="col-sm-9 padding-right">

                    <div class="features_items">

                        <h2 class="title text-center">{{ $category->name or $brand->name }}</h2>

                        @forelse($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">

                                    <div class="single-products">
                                        <div class="productinfo text-center">

                                            <a href="{{ url('product/' . $product->slug) }}">
                                                <img src="{{ asset( $images[$product->id] ) }}" alt="{{ $product->name }}" />
                                            </a>

                                            <h2>${{ $product->price }}</h2>

                                            <p><a href="{{ url('product/' . $product->slug) }}">{{ $product->name }}</a></p>

                                            <a href="#" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>{{ trans('vi.Add to cart') }}
                                            </a>

                                        </div>
                                        <!--<div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>-->
                                    </div>

                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-sm-12">
                                <span>No product.</span>
                            </div>
                        @endforelse

                    </div><!--features_items-->

                    <div class="pull-right">
                        {!! $products->render() !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop


