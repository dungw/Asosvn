@extends('layouts.default')

@section('title')
    {{ trans('lang.Checkout Success') }}
@stop

@section('content')
    <div class="container checkout-success">
        <h4 class="text-center">Thank you for your order!</h4>
        <h5 class="text-center">Your order code is: <strong>#{{ $order_id }}</strong></h5>
        <h5 class="text-center">We will contact you about this order.</h5>
    </div>
@stop
