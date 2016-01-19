
<div class="shop-menu pull-right" id="shop-menu">
    <ul class="nav navbar-nav">
        <li>
            <a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i>{{ trans('lang.Cart') }}
                @if ($cartQty > 0)
                    <div class="cart-qty">
                        <div class="@if ($cartQty > 99) circle-plus @else circle @endif">
                            <span>{{ $cartQty }}</span>
                        </div>
                    </div>
                @else
                    <div class="cart-empty"></div>
                @endif
            </a>
        </li>
        <li class="link-checkout"><a href="checkout.html"><i class="fa fa-crosshairs"></i> {{ trans('lang.Checkout') }}</a></li>
        <li><a href="#"><i class="fa fa-star"></i> {{ trans('lang.Wishlist') }}</a></li>
        @if (Auth::guest())
            <li><a href="{{ url('account') }}"><i class="fa fa-user"></i> {{ trans('lang.Account') }}</a></li>
        @else
            <li><a href="{{ url('account/logout') }}"><i class="fa fa-user"></i> {{ trans('lang.Logout') }}</a></li>
        @endif
    </ul>
</div>