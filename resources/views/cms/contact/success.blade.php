@extends('layouts.default')

@section('title')
    {{ trans('lang.Contact') }}
@stop

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('includes.default.left-sidebar')
                </div>
                <div class="col-sm-9">
                    <h4 class="text-center">Thank you for your comment!</h4>
                    <p class="text-center">We have receipt your comment and response to you as soon as.</p>
                </div>
            </div>
        </div>
    </section>

@stop
