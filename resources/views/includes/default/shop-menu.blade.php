
<div class="shop-menu pull-right" id="shop-menu">
    <ul class="nav navbar-nav">
        <li>
            <a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i>{{ trans('vi.Cart') }}
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
        <li class="link-checkout"><a href="checkout.html"><i class="fa fa-crosshairs"></i> {{ trans('vi.Checkout') }}</a></li>
        <li><a href="#"><i class="fa fa-star"></i> {{ trans('vi.Wishlist') }}</a></li>
        <li><a href="#"><i class="fa fa-user"></i> {{ trans('vi.Account') }}</a></li>
    </ul>
</div>