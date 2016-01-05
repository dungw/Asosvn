<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.default.head')

    @yield('head')
</head>

<body>
    <header>
        @include('includes.default.header')
    </header>

    @yield('intermediate')

    @yield('content')

    @include('includes.default.footer')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/price-range.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/jquery.growl.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/cart/my-cart.js') }}"></script>

    @yield('footer-content')
</body>
</html>