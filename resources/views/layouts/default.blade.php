<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    <header>
        @include('includes.header')
    </header>

    @yield('intermediate')

    @yield('content')

    @include('includes.footer')
</body>
</html>