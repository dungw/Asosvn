<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="salezone.vn, salezone, {{ trans('lang.Leather') }}, {{ trans('lang.Leather bag') }}, {{ trans('lang.Leather wallet') }}, {{ trans('lang.Leather belt') }}, {{ trans('lang.Handmade') }}, {{ trans('lang.Real leather') }}">
<meta name="description" content="salezone.vn, salezone, {{ trans('lang.Leather') }}, {{ trans('lang.Leather bag') }}, {{ trans('lang.Leather wallet') }}, {{ trans('lang.Leather belt') }}, {{ trans('lang.Handmade') }}">
<meta name="author" content="">
<meta property="og:title" content=""/>
<meta property="og:description" content=""/>
<meta property="og:type" content="website" />
<meta name="copyright" content="salezone.vn" />
<meta name="author" content="salezone.vn" />
<meta name="abstract" content="" />
<meta name="GENERATOR" content="SaleZone"/>

<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>@yield('title') | Sale-Zone</title>
<link rel="icon" href="{{ url('images/icon/favicon.png') }}" type="image/gif" sizes="32x32">

<link href="{{ asset('css/bootstrap-3.3.6/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
<link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('css/frontend-customize-responsive.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.growl.css') }}" rel="stylesheet">
@if (Request::url() == url('checkout/custom'))
<link href="{{ asset('css/vendor/dropzone.css') }}" rel="stylesheet">
@endif
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!--[if lt IE 9]>
<script src="{{ asset('js/html5shiv.js') }}"></script>
<script src="{{ asset('js/respond.min.js') }}"></script>
<![endif]-->

<link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">
