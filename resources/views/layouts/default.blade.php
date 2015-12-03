<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.default.head')
</head>

<body>
    <header>
        @include('includes.default.header')
    </header>

    @yield('intermediate')

    @yield('content')

    @include('includes.default.footer')
</body>
</html>