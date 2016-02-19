@extends('layouts.default')

@section('title')
    {{ $blog->title }}
@stop

@section('facebook')
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            var lang = '{{ Config::get('app.lang.' . App::getLocale()) }}';
            if (lang == '') {
                lang = 'vi_Vn';
            }
            js.src = "//connect.facebook.net/" + lang + "/sdk.js#xfbml=1&version=v2.5&appId=1540297046283675";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@stop

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('includes.default.left-sidebar')
                </div>

                <div class="col-sm-9">
                    <div class="row">
                        <div class="blog-details">

                            <p class="blog-title">{{ ucfirst($blog->title) }}</p>

                            <p class="blog-subtitle">{{ ucfirst($blog->subtitle) }}</p>
                            {!! $blog->content !!}

                            <div class="fb-share-button" data-href="{{ url(Request::url()) }}" data-layout="button_count"></div>
                            <div class="fb-like" data-href="{{ url(Request::url()) }}" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
