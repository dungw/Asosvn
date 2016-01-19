<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">

<head>
    @include('includes.default.head')

    @yield('head')
</head>

<body>
    @yield('facebook')

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

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('front-footer-content')
</body>
</html>