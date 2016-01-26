@extends('layouts.default')

@section('title')
    {{ trans('lang.Checkout Success') }}
@stop

@section('content')
    <div>
        <p>Thank for order.</p>
        <p>your order code is: </p>
        <p>#{{ $order_id }}</p>
        <p>We will contact you ....</p>
    </div>
@stop
