@extends('layouts.default')

@section('title')
    {{ trans('lang.Checkout') }}
@stop

@section('content')
    <section class="checkout-page">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div>

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-1">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ trans('lang.' . $error) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <div class="shopper-info">
                            <p>{{ trans('lang.Shopper Information') }}</p>
                            {!! Form::open(['method' => 'post', 'url' => 'checkout/create']) !!}
                                <input type="text" name="name" placeholder="{{ trans('lang.Name') }}" required maxlength="100">
                                <input type="email" name="email" placeholder="{{ trans('lang.Email') }}" required maxlength="100">
                                <input type="text" name="phone" placeholder="{{ trans('lang.Phone') }}" class="phone-number" required maxlength="15">
                                <input type="text" name="address" placeholder="{{ trans('lang.Address') }}" required>
                                <textarea name="note" placeholder="{{ trans('lang.Notes about your order') }}..." rows="3"></textarea>
                                <button type="submit" title="{{ trans('lang.Place Order') }}" class="btn btn-primary btn-place-order" @if (\Gloudemans\Shoppingcart\Facades\Cart::count() == 0) disabled @endif>
                                    {{ trans('lang.Place Order') }}
                                </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="shopper-info">
                            <p>{{ trans('lang.Order Information') }}</p>
                        </div>
                        @if (\Gloudemans\Shoppingcart\Facades\Cart::count() > 0)
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>{{ trans('lang.Cart Sub Total') }}</td>
                                    <td>{!! App\Helpers\Currency::currency(\Gloudemans\Shoppingcart\Facades\Cart::total()) !!}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>{{ trans('lang.Shipping Cost') }}</td>
                                    <td>{{ trans('lang.Free') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('lang.Total') }}</td>
                                    <td><span>{!! App\Helpers\Currency::currency(\Gloudemans\Shoppingcart\Facades\Cart::total()) !!}</span></td>
                                </tr>
                            </table>
                        @else
                            <p>{{ trans('lang.Your cart is empty!') }}</p>
                            <p>{{ trans('lang.Click') }} <a href="{{ url('/') }}">{{ trans('lang.here') }}</a> {{ trans('lang.to continue shopping') }}.</p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <div class="shopper-info">
                            <p>{{ trans('lang.Payment Information') }}</p>
                        </div>
                        <div class="order-message">
                            Dat coc truoc 20%, huong dan thong tin thanh toan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('front-footer-content')
    <script type="text/javascript">
        $( document).ready(function() {
            $(".phone-number").on("keydown", function(e) {
                if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode == 13 || e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 37 || e.keyCode == 39) {

                } else {
                    e.preventDefault();
                }
            });
        });
    </script>
@stop