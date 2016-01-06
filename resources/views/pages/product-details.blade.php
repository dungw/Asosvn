@extends('layouts.default')

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
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach( $product->images as $index => $image)
                                        <div class="item @if ($index == 0)active @endif">
                                            <img src="{{ asset('uploads/products/' . $image['image'][0] . '/' . $image['image'][1] . '/' . $image['image'][2] . '/' . $image['image']) }}" alt="{{ $image['image'] }}" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="thumbcarousel" class="carousel slide" data-interval="false">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        @foreach( $product->images as $index => $image)
                                            <div data-target="#carousel" data-slide-to="{{ $index }}" class="thumb">
                                                <img src="{{ asset('uploads/products/' . $image['image'][0] . '/' . $image['image'][1] . '/' . $image['image'][2] . '/' . $image['image']) }}" alt="{{ $image['image'] }}" />
                                            </div>
                                            @if (($index + 1) % 3 == 0 && ($index + 1) < count($product->images))
                                                </div>
                                                <div class="item">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                @if (count($product->images) > 3)
                                    <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="{{ asset('images/product-details/new.jpg') }}" class="newarrival" alt="" />
                                <input type="hidden" value="{{ $product->id }}" id="detail-id"/>
                                <input type="hidden" value="{{ $product->name }}" id="detail-name"/>
                                <input type="hidden" value="{{ $product->price }}" id="detail-price"/>
                                <input type="hidden" value="{{$product->images[0]['image']}}" id="detail-image"/>
                                <input type="hidden" value="{{ $product->sku }}" id="detail-sku"/>
                                <input type="hidden" value="{{ $product->slug }}" id="detail-slug"/>
                                <h2>{{ $product->name }}</h2>
                                <p>{{ trans('vi.SKU') }}: {{ $product->sku }}</p>
                                <img src="{{ asset('images/product-details/rating.png') }}" alt="" />
								<span>
									<span>US ${{ $product->price }}</span>
									<label>{{ trans('vi.Quantity') }}:</label>
									<input type="number" value="1" min="0" id="detail-quantity"/>
									<button type="button" class="btn btn-fefault cart" @if ($product->availability != 'available') disabled @else id="btn-detail-add-cart" @endif>
                                        <i class="fa fa-shopping-cart"></i>
                                        {{ trans('vi.Add to cart') }}
                                    </button>
								</span>
                                <p><b>{{ trans('vi.Availability') }}:</b> {{ trans('vi.' . $product->availability) }}</p>
                                @if ($product->condition)
                                    <p><b>Condition:</b> {{ trans('vi.' . $product->condition) }}</p>
                                @endif
                                <p><b>{{ trans('vi.Brand') }}:</b> {{ $product->brand_name or trans('vi.unclear')}}</p>
                                <a href=""><img src="{{ asset('images/product-details/share.png') }}" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->

                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#description" data-toggle="tab">{{ trans('vi.Description') }}</a></li>
                                <li><a href="#abc" data-toggle="tab">Something</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                {!! $product->description !!}
                            </div>

                            <div class="tab-pane fade" id="abc">
                                Something else here
                            </div>
                        </div>
                    </div><!--/category-tab-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend2.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend3.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                                                    <img src="images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend2.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend3.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @if (Session::has('success'))
        <script type="text/javascript"> $.growl.notice({ message: "{{ Session::get('success') }}" }); </script>
    @endif
@stop

@section('front-footer-content')
    <script type="text/javascript">
        $(document).ready(function ($) {
            var id = $("#detail-id").val();
            var name = $("#detail-name").val();
            var qty = $("#detail-quantity").val();
            var price = $("#detail-price").val();
            var slug = $("#detail-slug").val();
            var image = $("#detail-image").val();
            var sku = $("#detail-sku").val();

            $("#btn-detail-add-cart").on("click", function() {
                $.addToCart(id, name, qty, price, slug, image, sku);
            });
        })
    </script>
@stop

