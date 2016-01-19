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

                            <input type="hidden" value="{{ $product->id }}" id="detail-id-{{ $product->id }}"/>
                            <input type="hidden" value="{{ $product->name }}" id="detail-name-{{ $product->id }}"/>
                            <input type="hidden" value="{{ $product->price }}" id="detail-price-{{ $product->id }}"/>
                            <input type="hidden" value="{{$product->images[0]['image']}}" id="detail-image-{{ $product->id }}"/>
                            <input type="hidden" value="{{ $product->sku }}" id="detail-sku-{{ $product->id }}"/>
                            <input type="hidden" value="{{ $product->slug }}" id="detail-slug-{{ $product->id }}"/>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">

                                    <div class="single-products">
                                        <div class="productinfo text-center">

                                            <a href="{{ url('product/' . $product->slug) }}">
                                                <img src="{{ asset( $images[$product->id] ) }}" alt="{{ $product->name }}" />
                                            </a>

                                            <h2>${{ $product->price }}</h2>

                                            <p><a href="{{ url('product/' . $product->slug) }}">{{ $product->name }}</a></p>

                                            <button type="button" data-product="{{ $product->id }}" class="btn btn-fefault add-to-cart @if ($product->availability != 'available') disabled @else btn-list-add-cart @endif">
                                                <i class="fa fa-shopping-cart"></i>
                                                {{ trans('lang.Add to cart') }}
                                            </button>

                                        </div>
                                        <!--
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                        -->
                                    </div>
                                    <!--
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                    -->
                                </div>
                            </div>
                        @empty
                            <div class="col-sm-12">
                                <span>{{ trans('lang.No product.') }}</span>
                            </div>
                        @endforelse

                    </div>

                    <div class="pull-right">
                        {!! $products->render() !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop

@section('front-footer-content')
    <script type="text/javascript">
        $(document).ready(function ($) {

            $(".btn-list-add-cart").on("click", function() {

                var id = $(this).attr('data-product');
                var name = $("#detail-name-" + id).val();
                var price = $("#detail-price-" + id).val();
                var slug = $("#detail-slug-" + id).val();
                var image = $("#detail-image-" + id).val();
                var sku = $("#detail-sku-" + id).val();
                var qty = 1;

                $.addToCart(id, name, qty, price, slug, image, sku);

            });
        })
    </script>
@stop

