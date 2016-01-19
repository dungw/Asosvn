@extends('layouts.default')

@section('title')
    {{ $product->name }}
@stop

@section('head')
    <link href="{{ asset('css/jquery.fancybox.css') }}" rel="stylesheet">
@stop

@section('facebook')
    {{--Include the JavaScript SDK--}}
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            var lang = '{{ Config::get('app.lang.' . App::getLocale()) }}';
            if (lang == '') {
                lang = 'vi_Vn';
            }
            js.src = "//connect.facebook.net/" + lang + "/sdk.js#xfbml=1&version=v2.5&appId=1540297046283675";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    {{-- End Include the JavaScript SDK--}}
@stop

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('includes.default.left-sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <div class="col-sm-5">

                            <img id="zoom_03" class="main-image"
                                 src="{{ asset(\App\Helpers\ImageManager::getContainerFolder('product', $mainImage) . $mainImage ) }}"
                                 data-zoom-image="{{ asset(\App\Helpers\ImageManager::getContainerFolder('product', $mainImage) . $mainImage ) }}"/>

                            <div id="gallery_01" class="carousel slide">
                                @foreach( $product->images()->lists('image') as $image)
                                    <a href="#" class="thumb"
                                       data-image="{{ asset(\App\Helpers\ImageManager::getContainerFolder('product', $image) . $image) }}"
                                       data-zoom-image="{{ asset(\App\Helpers\ImageManager::getContainerFolder('product', $image) . $image) }}">
                                            <img style="width: 85px; height: 84px;" src="{{ asset(\App\Helpers\ImageManager::getThumb($image, 'product')) }}">
                                    </a>
                                @endforeach
                            </div>

                        </div>

                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="{{ asset('images/product-details/new.jpg') }}" class="newarrival" alt=""/>
                                <input type="hidden" value="{{ $product->id }}" id="detail-id"/>
                                <input type="hidden" value="{{ $product->name }}" id="detail-name"/>
                                <input type="hidden" value="{{ $product->price }}" id="detail-price"/>
                                <input type="hidden" value="{{ $mainImage }}" id="detail-image"/>
                                <input type="hidden" value="{{ $product->sku }}" id="detail-sku"/>
                                <input type="hidden" value="{{ $product->slug }}" id="detail-slug"/>

                                <h2>{{ $product->name }}</h2>

                                <p>{{ trans('lang.SKU') }}: {{ $product->sku }}</p>
                                <img src="{{ asset('images/product-details/rating.png') }}" alt=""/>
								<span>
									<span>{!! App\Helpers\Currency::currency($product->price) !!}</span>
									<label>{{ trans('lang.Quantity') }}:</label>
									<input type="number" value="1" min="1" id="detail-quantity"/>
									<button type="button"
                                            class="btn btn-fefault cart" @if ($product->availability != 'available')
                                            disabled @else id="btn-detail-add-cart" @endif>
                                        <i class="fa fa-shopping-cart"></i>
                                        {{ trans('lang.Add to cart') }}
                                    </button>
								</span>

                                <p><b>{{ trans('lang.Availability') }}
                                        :</b> {{ trans('lang.' . $product->availability) }}</p>
                                @if ($product->condition)
                                    <p><b>Condition:</b> {{ trans('lang.' . $product->condition) }}</p>
                                @endif
                                <p><b>{{ trans('lang.Brand') }}:</b> {{ $product->brand->name or trans('lang.unclear')}}
                                </p>

                                <div class="fb-like" data-href="{{ url(Request::url()) }}" data-layout="standard"
                                     data-action="like" data-show-faces="true" data-share="false"></div>
                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->

                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#description"
                                                      data-toggle="tab">{{ trans('lang.Description') }}</a></li>
                                <li><a href="#facebook-comment"
                                       data-toggle="tab">{{ trans('lang.Facebook Comment') }}</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                {!! $product->description !!}
                            </div>

                            <div class="tab-pane fade" id="facebook-comment">
                                <div class="fb-comments" data-href="{{ url(Request::url()) }}" data-numposts="5"
                                     data-width="100%" data-order-by="social"></div>
                            </div>
                        </div>
                    </div>
                    <!--/category-tab-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{ asset('images/home/recommend1.jpg') }}" alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{ asset('images/home/recommend2.jpg') }}" alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{ asset('images/home/recommend3.jpg') }}" alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{ asset('images/home/recommend1.jpg') }}" alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{ asset('images/home/recommend2.jpg') }}" alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{ asset('images/home/recommend3.jpg') }}" alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @if (Session::has('success'))
        <script type="text/javascript"> $.growl.notice({message: "{{ Session::get('success') }}"}); </script>
    @endif
@stop

@section('front-footer-content')
    <script src="{{ asset('js/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function ($) {

            //initiate the plugin and pass the id of the div containing gallery images
            $("#zoom_03").elevateZoom({
                gallery: 'gallery_01',
                cursor: 'pointer',
                galleryActiveClass: 'active',
                imageCrossfade: true,
                loadingIcon: '{{ asset('images/spinner.gif') }}'
            });

            //pass the images to Fancybox
            $("#zoom_03").bind("click", function (e) {
                var ez = $('#zoom_03').data('elevateZoom');
                $.fancybox(ez.getGalleryList());
                return false;
            });

            var id = $("#detail-id").val();
            var name = $("#detail-name").val();
            var price = $("#detail-price").val();
            var slug = $("#detail-slug").val();
            var image = $("#detail-image").val();
            var sku = $("#detail-sku").val();
            var qty = 1;

            $("#detail-quantity").change(function () {
                qty = $("#detail-quantity").val();
            });

            $("#btn-detail-add-cart").on("click", function () {
                $.addToCart(id, name, qty, price, slug, image, sku);
            });
        })
    </script>
@stop

