@extends('layouts.default')

@section('title')
    {{ trans('lang.Cart') }}
@stop

@section('content')
    <section id="cart_items">
        <div class="container">

            @include('includes.default.breadcrumbs', ['items' => [
                ['title' => trans('lang.Home'), 'url' => url('/'), 'active' => 0],
                ['title' => trans('lang.Shopping Cart'), 'active' => 1],
            ]])

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image" width="10%">{{ trans('lang.Item') }}</td>
                            <td class="description" width="35%"></td>
                            <td class="price" width="15%">{{ trans('lang.Price') }}</td>
                            <td class="quantity" width="15%">{{ trans('lang.Quantity') }}</td>
                            <td class="total" width="15%">{{ trans('lang.Total') }}</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($cart as $item)
                        <tr id="cart-item-{{ $item->rowid }}">
                            <td class="cart_product" align="center">
                                <a href="{{ url('product/' . $item->options->slug) }}">
                                    @if ($item->options->image)
                                        <img class="img-cart-item" src="{{ asset(\App\Helpers\ImageManager::getThumb($item->options->image, 'product', 'small')) }}" alt="{{ $item->name }}" />
                                    @endif
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ url('product/' . $item->options->slug) }}">{{ $item->name }}</a></h4>
                                <p>{{ trans('lang.SKU') }}: {{ $item->options->sku }}</p>
                            </td>
                            <td class="cart_price">
                                <p>{!! App\Helpers\Currency::currency($item->price) !!}</p>
                            </td>
                            <td class="cart_quantity">

                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="javascript:void(0)" onclick="$.cartQuantityUp('{{ $item->rowid }}')"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="3" data-rowid="{{ $item->rowid }}">
                                    <a class="cart_quantity_down" href="javascript:void(0)" onclick="$.cartQuantityDown('{{ $item->rowid }}')"> - </a>
                                </div>

                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    <span class="item_total_price">{!! App\Helpers\Currency::currency($item->qty*$item->price) !!}</span>
                                </p>
                            </td>
                            <td class="cart_delete" align="center">
                                <a class="cart_quantity_delete" href="javascript:void(0)" onclick="$.removeFromCart('{{ $item->rowid }}')" title="{{ trans('lang.Remove Item') }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if (count($cart) == 0)
                        <tr>
                            <td colspan="6"><p class="empty-cart">{{ trans('lang.Your cart is empty!') }} {{ trans('lang.Click') }} <a href="{{ url('/') }}">{{ trans('lang.here') }}</a> {{ trans('lang.to continue shopping') }}.</p></td>
                        </tr>
                    @endif
                    <tr id="cart-empty-message" style="display: none !important;">
                        <td colspan="6"><p class="empty-cart">{{ trans('lang.Your cart is empty!') }} {{ trans('lang.Click') }} <a href="{{ url('/') }}">{{ trans('lang.here') }}</a> {{ trans('lang.to continue shopping') }}.</p></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    @include('pages.cart-total-area')
                </div>
            </div>
        </div>
    </section>
@stop

@section('front-footer-content')
    <script type="text/javascript">
        $( document).ready(function() {
            $(".cart_quantity_input").on("keydown", function(e) {
                if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode == 13 || e.keyCode == 8 || e.keyCode == 37 || e.keyCode == 39) {
                    var current = $(this);
                    $(this).on("change", function() {
                        var rowId = $(this).data('rowid');
                        if ($(this).val() == 0 || !$(this).val()) {
                            e.preventDefault();
                            $.get('/cart/qty/' + rowId, function(data) {
                                current.val(data);
                            });
                        } else {
                            $.cartUpdateQuantity(rowId, $(this).val());
                        }
                    });
                } else {
                    e.preventDefault();
                }
            });
        });
    </script>
@stop