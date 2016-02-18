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
                    list blog here

                </div>
            </div>
        </div>
    </section>

@stop
