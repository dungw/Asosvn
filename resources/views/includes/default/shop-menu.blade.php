
<div class="shop-menu pull-right" id="shop-menu">
    <ul class="nav navbar-nav">
        <li><a href="#"><i class="fa fa-user"></i> {{ trans('vi.Account') }}</a></li>
        <li><a href="#"><i class="fa fa-star"></i> {{ trans('vi.Wishlist') }}</a></li>
        <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> {{ trans('vi.Checkout') }}</a></li>
        <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> {{ trans('vi.Cart') }} ({{ $cartQty }})</a></li>
        <li><a href="login.html"><i class="fa fa-lock"></i> {{ trans('vi.Login') }}</a></li>
    </ul>
</div>