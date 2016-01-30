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
                            {!! Form::open(['method' => 'post', 'url' => 'checkout/create', 'class' => 'normal-checkout']) !!}
                                <input type="text" name="name" id="normal-name" placeholder="{{ trans('lang.Name') }}" 
                                    required maxlength="100" @if (Auth::check()) value="{{ Auth::user()->name }}" @endif>
                                <input type="email" name="email" id="normal-email" placeholder="{{ trans('lang.Email') }}" 
                                    required maxlength="100" @if (Auth::check()) value="{{ Auth::user()->email }}" @endif>
                                <input type="text" name="phone" id="normal-phone" placeholder="{{ trans('lang.Phone') }}" 
                                    class="phone-number" required maxlength="15" @if (Auth::check()) value="{{ Auth::user()->phone }}" @endif>
                                <input type="text" name="address" id="normal-address" placeholder="{{ trans('lang.Address') }}" 
                                    required @if (Auth::check()) value="{{ Auth::user()->address }}" @endif>
                                <textarea name="note" id="normal-note" placeholder="{{ trans('lang.Notes about your order') }}..." rows="3"></textarea>
                                @if (Request::url() == url('checkout/custom')) 
                                    <button type="button" title="{{ trans('lang.Place Order') }}" class="btn btn-primary btn-place-order">
                                        {{ trans('lang.Place Order') }}
                                    </button>
                                @else    
                                    <button type="submit" title="{{ trans('lang.Place Order') }}" class="btn btn-primary btn-place-order" @if (\Gloudemans\Shoppingcart\Facades\Cart::count() == 0) disabled @endif>
                                        {{ trans('lang.Place Order') }}
                                    </button>
                                @endif                                
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="shopper-info">
                            <p>{{ trans('lang.Order Information') }}</p>
                        </div>
                        @if (Request::url() == url('checkout/custom'))
                            <div class="shopper-info">
                                {!! Form::open(['method' => 'post', 'url' => 'checkout/create', 'class' => 'dropzone', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'my-dropzone']) !!}
                                    <input type="text" name="url" id="custom-url" placeholder="URL({{ trans('lang.Link you want to show product') }})"/>
                                    <input type="text" name="name" id="custom-name" class="hidden" @if (Auth::check()) value="{{ Auth::user()->name }}" @endif>
                                    <input type="email" name="email" id="custom-email" class="hidden" @if (Auth::check()) value="{{ Auth::user()->email }}" @endif>
                                    <input type="text" name="phone" id="custom-phone" class="hidden" @if (Auth::check()) value="{{ Auth::user()->phone }}" @endif>
                                    <input type="text" name="address" id="custom-address" class="hidden" @if (Auth::check()) value="{{ Auth::user()->address }}" @endif>
                                    <textarea name="note" id="custom-note" class="hidden"></textarea>
                                    <p class="text-center"><small>{{ trans('lang.OR') }}</p>
                                {!! Form::close() !!}
                            </div>
                        @else
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
    <script src="{{ asset('js/checkout/validate.js') }}"></script>
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
    @if (Request::url() == url('checkout/custom'))
        <script src="{{ asset('js/vendor/dropzone.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#normal-name").change(function() {
                    $("#custom-name").val($("#normal-name").val());
                });
                $("#normal-email").change(function() {
                    $("#custom-email").val($("#normal-email").val());
                });
                $("#normal-phone").change(function() {
                    $("#custom-phone").val($("#normal-phone").val());
                });
                $("#normal-address").change(function() {
                    $("#custom-address").val($("#normal-address").val());
                });
                $("#normal-note").change(function() {
                    $("#custom-note").val($("#normal-note").val());
                });

                Dropzone.options.myDropzone = {
                    paramName: "file",
                    maxFilesize: 10,
                    maxFiles: 10,
                    acceptedFiles: "image/*",
                    autoProcessQueue: false,
                    uploadMultiple: true,
                    addRemoveLinks: true,
                    dictRemoveFile: '{{ trans('lang.Remove')}}',
                    dictDefaultMessage: '{{ trans('lang.Drop files here or click to upload.')}}',
                    
                    init: function() {
                        var myDropzone = this;
                        //place order
                        $(".btn-place-order").on('click', function(e) {
                            if ($.validateCheckoutForm()) {
                                if ($("#custom-url").val().trim() == '' && myDropzone.getQueuedFiles().length == 0) {
                                    $("#custom-url").focus();
                                } else {
                                    if (myDropzone.getQueuedFiles().length == 0) {
                                        //todo: add empty file to #my-dropzone
                                    }
                                    myDropzone.processQueue();
                                }
                            };
                        });
                    }
                };
            });
        </script>
    @else
        <script type="text/javascript">
            $(function() {
                //place order
                $(".btn-place-order").on('click', function() {
                    if ($.validateCheckoutForm()) {
                        $(".normal-checkout").submit();
                    };
                });
            });
        </script>    
    @endif   
@stop