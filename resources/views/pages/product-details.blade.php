@extends('layouts.default')

@section('title')
    {{ $product->name }}
@stop

@section('head')
    <link href="{{ asset('css/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
    <script >
        var lang = '{{ Config::get('app.lang.' . App::getLocale()) }}';
            if (lang == '' || lang == 'vi_VN') {
                lang = 'vi_VN';
            } else {
                lang = 'en-US';
            }
        window.___gcfg = {
            lang: lang,
            parsetags: 'onload'
        };
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
@stop

@section('facebook')
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
@stop

@section('content')
    <section>
        <div class="container">

            @include('includes.default.breadcrumbs', ['items' => [
                ['title' => trans('lang.Home'), 'url' => url('/'), 'active' => 0],
                ['title' => $product->category->name, 'url' => url('c/' . $product->category->slug), 'active' => 0],
                ['title' => $product->name, 'active' => 1],
            ]])

            <div class="row">
                <div class="col-sm-3">
                    @include('includes.default.left-sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details">

                        <div class="col-md-12">

                            <div class="image-wrapper row vertical-align">
                                <div class="col-sm-12">
                                    <img id="zoom_03" class="main-image"
                                         src="{{ asset(\App\Helpers\ImageManager::getThumb($mainImage, 'product', 'medium') ) }}"
                                         data-zoom-image="{{ asset(\App\Helpers\ImageManager::getContainerFolder('product', $mainImage) . $mainImage ) }}"/>
                                </div>
                            </div>

                            <div id="gallery_01" class="carousel slide">
                                @foreach( $product->images()->lists('image') as $image)
                                    <a href="#" class="thumb"
                                       data-image="{{ asset(\App\Helpers\ImageManager::getThumb($image, 'product', 'medium')) }}"
                                       data-zoom-image="{{ asset(\App\Helpers\ImageManager::getContainerFolder('product', $image) . $image) }}">
                                        <img style="max-width: 85px; max-height: 85px;"
                                             src="{{ asset(\App\Helpers\ImageManager::getThumb($image, 'product')) }}">
                                    </a>
                                @endforeach
                            </div>

                        </div>

                        <div class="col-sm-7">
                            <div class="product-information">
                                <img src="{{ asset('images/product-details/new.jpg') }}" class="newarrival" alt=""/>
                                <input type="hidden" value="{{ $product->id }}" id="detail-id"/>
                                <input type="hidden" value="{{ $product->name }}" id="detail-name"/>
                                <input type="hidden" value="{{ $product->price }}" id="detail-price"/>
                                <input type="hidden" value="{{ $mainImage }}" id="detail-image"/>
                                <input type="hidden" value="{{ $product->sku }}" id="detail-sku"/>
                                <input type="hidden" value="{{ $product->slug }}" id="detail-slug"/>

                                <h2>{{ $product->name }}</h2>

                                <p>{{ trans('lang.SKU') }}: {{ $product->sku }}</p>

								<span>
									<span>{!! App\Helpers\Currency::currency($product->price) !!}</span>
                                </span>

                                <br>
                                <span>
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
                                <p><b>{{ trans('lang.Brand') }}:</b> {{ $product->brand->name or trans('lang.unclear')}}
                                </p>

                                <div class="cocial-share-container">
                                    <div class="g-plusone gg-plus" data-href="{{ url(Request::url()) }}" data-annotation="bubble" ></div>
                                    <div class="fb-send" data-href="{{ url(Request::url()) }}"></div>
                                    <div class="fb-share-button" data-href="{{ url(Request::url()) }}" data-layout="button_count"></div>
                                    <div class="fb-like" data-href="{{ url(Request::url()) }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>                                 
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">

                        </div>

                    </div>

                    <div class="category-tab shop-details-tab">
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

                                <table>
                                    @foreach($extraAttributes as $attribute)
                                        <tr>
                                            <td>{{ $attribute['name'] }}</td>
                                            <td>{{ $attribute['value'] }}</td>
                                        </tr>
                                    @endforeach
                                </table>

                            </div>

                            <div class="tab-pane fade" id="facebook-comment">
                                <div class="fb-comments" data-href="{{ url(Request::url()) }}" data-numposts="5"
                                     data-width="100%" data-order-by="social"></div>
                            </div>
                        </div>
                    </div>

                    <div class="recommended_items">
                        <h2 class="title text-center">{{ trans('lang.Recommended items') }}</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">

                                    @foreach ($recommendedProducts as $index => $recommended)

                                        @if ($index % 3 == 0 && $index > 0)
                                            </div><div class="item">
                                        @endif

                                        @include('pages.partials.single_product', ['product' => $recommended])

                                    @endforeach
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
                galleryActiveClass: 'active-slide',
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

