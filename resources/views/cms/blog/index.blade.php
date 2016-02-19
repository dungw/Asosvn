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
                    <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a href="{{ url('blog/' . $blog->slug) }}">
                                    @if (file_exists(\App\Helpers\ImageManager::getContainerFolder('blog', $blog->image) . '/' . $blog->image))
                                        <img src="{{ asset(\App\Helpers\ImageManager::getContainerFolder('blog', $blog->image) . '/' . $blog->image) }}"
                                            width="242px" height="200px" alt="{{ $blog->title }}">
                                    @else
                                        <img src="{{ asset(\App\ProductImage::NO_IMAGE) }}" alt=""/>
                                    @endif
                                </a>
                                <div class="caption">
                                    <a href="{{ url('blog/' . $blog->slug) }}">
                                        <h4>{{ $blog->title }}</h4>
                                    </a>
                                    {!! $blog->content !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>

                <div class="pull-right more-blog">
                    <a href="{{ url('blog/list') }}">{{ trans('lang.Show more') }}...</a>
                </div>
            </div>
        </div>
    </section>

@stop
