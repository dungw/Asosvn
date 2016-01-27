
<div class="shop-menu pull-right" id="shop-menu">
    <ul class="nav navbar-nav">
        <li>
            <a href="{{ url('cart') }}" class="@if (Request::url() == url('cart')) active @endif">
                <i class="fa fa-shopping-cart"></i>{{ trans('lang.Cart') }}
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
        <li class="link-checkout">
            <a href="{{ url('checkout') }}" class="@if (Request::url() == url('checkout')) active @endif">
                <i class="fa fa-crosshairs"></i> {{ trans('lang.Checkout') }}
            </a>
        </li>
        <li>
            <a href="#" class="@if (Request::url() == url('wishlist')) active @endif">
                <i class="fa fa-star"></i> {{ trans('lang.Wishlist') }}
            </a>
        </li>
        @if (Auth::guest())
            <li>
                <a href="{{ url('account') }}" class="@if (Request::url() == url('account')) active @endif">
                    <i class="fa fa-user"></i> {{ trans('lang.Account') }}
                </a>
            </li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle @if (Request::url() == url('account/dashboard') || Request::url() == url('account/order')) active @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ trans('lang.Account') }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('account/dashboard') }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('account/logout') }}"><i class="fa fa-power-off"></i> {{ trans('lang.Logout') }}</a></li>
                </ul>
            </li>
        @endif
    </ul>
</div>