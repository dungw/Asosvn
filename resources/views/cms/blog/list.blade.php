@extends('layouts.default')

@section('title')
    Blog
@stop

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('includes.default.left-sidebar')
                </div>

                <div class="col-sm-9">
                    @foreach($blogs as $blog)
                        <div class="media">
                            <div class="media-left">
                                <a href="{{ url('blog/' . $blog->slug) }}">
                                    @if (file_exists(\App\Helpers\ImageManager::getContainerFolder('blog', $blog->image) . '/' . $blog->image))
                                        <img src="{{ asset(\App\Helpers\ImageManager::getContainerFolder('blog', $blog->image) . '/' . $blog->image) }}"
                                             width="242px" height="200px" alt="{{ $blog->title }}" class="media-object">
                                    @else
                                        <img src="{{ asset(\App\ProductImage::NO_IMAGE) }}" width="242px" height="200px"
                                             alt="" class="media-object"/>
                                    @endif
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading blog-title">
                                    <a href="{{ url('blog/' . $blog->slug) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h4>
                                <p>{{ $blog->subtitle }}</p>
                                <p class="blog-date">{{ \App\Helpers\DateTime::gmDate($blog->created_at) }}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="pull-right">
                        {!! $blogs->render() !!}
                    </div>                    
                </div>
            </div>
        </div>
    </section>

@stop
