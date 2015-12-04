<!DOCTYPE html>
<html>
<head>
    @include('admin.includes.auth.head')
</head>
<body class="hold-transition login-page">

    <!-- .login-box -->
    <div class="login-box">
        @yield('content')
    </div>
    <!-- /.login-box -->

    @include('admin.includes.auth.footer')

</body>
</html>
