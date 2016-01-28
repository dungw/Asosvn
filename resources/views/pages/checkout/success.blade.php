@extends('layouts.default')

@section('title')
    {{ trans('lang.Checkout Success') }}
@stop

@section('content')
    <div class="container checkout-success-page">

        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
                <h2 class="title">Thank you for your order!</h2>
                <p>Your order code is: <strong>#{{ $order_id }}</strong></p>
                <p>We will send to you confirmation email about this order. Please check your email.</p>
                <p>You can manage your orders in <a href="{{ url('account/dashboard') }}" target="_blank">Profile Page</a></p>
                <p>Please follow the payment guide which available in here <a href="" target="_blank">Payment Guide</a></p>
                <p>Should you need further support, don't hesitate to let us know <a href="" target="_blank">Contact Us</a> </p>
            </div>
        </div>

        <div class="row signature">
            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8  col-xs-offset-1 col-xs-10">
                <p>SaleZone Team</p>
            </div>
        </div>

    </div>
@stop
