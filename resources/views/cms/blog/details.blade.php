@extends('layouts.default')

@section('title')
    {{ $blog->title }}
@stop

@section('head')
    <script >
        var lang = '{{ Config::get('app.lang.' . App::getLocale()) }}';
            if (lang == '' || lang == 'vi_VN') {
                lang = 'vi_VN';
            } else {
                lang = 'en-US';
            }
        window.___gcfg = {
            lang: lang,
            parsetags: 'onload'
        };
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
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

                            <p class="blog-date">{{ \App\Helpers\DateTime::gmDate($blog->created_at) }}</p>

                            <p class="blog-title">{{ ucfirst($blog->title) }}</p>

                            <p class="blog-subtitle">{{ ucfirst($blog->subtitle) }}</p>
                            {!! $blog->content !!}

                            <div class="cocial-share-container">
                                <div class="g-plusone gg-plus" data-href="{{ url(Request::url()) }}" data-annotation="bubble" ></div>
                                <div class="fb-send" data-href="{{ url(Request::url()) }}"></div>
                                <div class="fb-share-button" data-href="{{ url(Request::url()) }}" data-layout="button_count"></div>
                                <div class="fb-like" data-href="{{ url(Request::url()) }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>                                 
                            </div>
                            
                        </div>
                    </div>

                    @if (count($older_blogs))
                        <h4>{{ trans('lang.order_post') }}</h4>
                        <div class="row">
                            @foreach($older_blogs as $blog)
                                <div class="media older-post">
                                    <div class="media-left">
                                        <a href="{{ url('blog/' . $blog->slug) }}">
                                            @if (file_exists(\App\Helpers\ImageManager::getContainerFolder('blog', $blog->image) . '/' . $blog->image))
                                                <img src="{{ asset(\App\Helpers\ImageManager::getContainerFolder('blog', $blog->image) . '/' . $blog->image) }}"
                                                     width="64px" height="64px" alt="{{ $blog->title }}" class="media-object">
                                            @else
                                                <img src="{{ asset(\App\ProductImage::NO_IMAGE) }}" width="64px" height="64px"
                                                     alt="" class="media-object"/>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <p class="blog-date">{{ \App\Helpers\DateTime::gmDate($blog->created_at) }}</p>
                                        <a href="{{ url('blog/' . $blog->slug) }}">
                                            {{ $blog->title }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="pull-right more-blog">
                                <a href="{{ url('blog/list') }}">{{ trans('lang.Show more') }}...</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>

@stop
