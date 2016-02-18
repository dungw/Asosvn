@extends('layouts.default')

@section('title')
    {{ $blog->title }}
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
                        details
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
