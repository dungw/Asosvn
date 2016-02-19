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

                            <p class="blog-date">{{ gmdate('l, d/m/Y | h:i A', strtotime($blog->created_at)) }}</p>

                            <p class="blog-title">{{ ucfirst($blog->title) }}</p>

                            <p class="blog-subtitle">{{ ucfirst($blog->subtitle) }}</p>
                            {!! $blog->content !!}

                            <div class="fb-share-button" data-href="{{ url(Request::url()) }}" data-layout="button_count"></div>
                            <div class="fb-like" data-href="{{ url(Request::url()) }}" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>

                        </div>
                    </div>

                    @if (count($older_blogs))
                        <h3>{{ trans('lang.order_post') }}</h3>
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
                                        <p class="blog-date">{{ gmdate('l, d/m/Y | h:i A', strtotime($blog->created_at)) }}</p>
                                        <h4 class="media-heading blog-title">
                                            <a href="{{ url('blog/' . $blog->slug) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h4>
                                        <p>{{ $blog->subtitle }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>

@stop
