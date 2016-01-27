@extends('layouts.default')

@section('title')
    {{ trans('lang.Manager Order ') }}
@stop

@section('content')
    <div class="container account-dashboard">
        @include('pages.account.navbar')

        <div class="col-sm-8 col-sm-offset-1">
            order
        </div>
    </div>
@stop
