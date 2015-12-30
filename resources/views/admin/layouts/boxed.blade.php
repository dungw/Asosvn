<!DOCTYPE html>
<html>

<head>
    @include('admin.includes.boxed.head')

    @yield('head')
</head>

<body class="hold-transition skin-blue layout-boxed sidebar-collapse sidebar-mini">
<div class="wrapper">

    @include('admin.includes.boxed.header')

    @include('admin.includes.boxed.sidebar')

    <div class="content-wrapper">

        @yield('breadcrumb')

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @yield('content')
                </div>
            </div>
        </section>

    </div>

    @include('admin.includes.boxed.footer')

    @include('admin.includes.boxed.control-sidebar')

    <div class="control-sidebar-bg"></div>
</div>

<script src="{{ asset('bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('bower_components/AdminLTE/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('bower_components/AdminLTE/dist/js/app.min.js') }}"></script>
<script src="{{ asset('bower_components/AdminLTE/dist/js/demo.js') }}"></script>
<script src="{{ asset('js/jquery.growl.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>

@yield('footer-content')

</body>
</html>
