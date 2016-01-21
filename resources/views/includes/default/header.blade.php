<div class="header_top"><!--header_top-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="contactinfo">
                    <ul class="nav nav-pills">
                        <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="social-icons pull-right">
                    <ul class="nav navbar-nav">
                        @if (Auth::user())
                            <li>{{ trans('lang.Hello') }}, {{ Auth::user()->name }}</li>
                        @endif
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header-middle">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo pull-left">
                    <a href="{{ url('/') }}"><img src="{{ asset('images/home/logo.png') }}" alt="{{ trans('lang.Home') }}"/></a>
                </div>
                <div class="btn-group select-currency">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            @if (Session::has('currency'))
                                @if (Session::get('currency') == 'VND')
                                    VNĐ
                                @else
                                    {{ Session::get('currency') }}
                                @endif
                            @else
                                {{ Config::get('app.currency_default')}}
                            @endif
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('currency/VND') }}">VNĐ</a></li>
                            <li><a href="{{ url('currency/USD') }}">USD</a></li>
                        </ul>
                    </div>
                </div>
                <div class="btn-group select-language">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            {{ trans('lang.' . App::getLocale()) }}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('language/vi') }}">{{ trans('lang.vi') }}</a></li>
                            <li><a href="{{ url('language/en') }}">{{ trans('lang.en') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                @include('includes.default.shop-menu')
            </div>
        </div>
    </div>
</div>

<div class="header-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <!--<li><a href="/" class="active">{{ trans('lang.Home') }}</a></li>-->
                        <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="shop.html">Products</a></li>
                                <li><a href="product-details.html">Product Details</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="login.html">Login</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="blog.html">Blog List</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li><a href="contact-us.html">{{ trans('lang.Contact') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">
                    <input type="text" placeholder="Search"/>
                </div>
            </div>
        </div>
    </div>
</div>