@extends('layouts.default')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">{{ trans('vi.Home') }}</a></li>
                    <li class="active">{{ trans('vi.Shopping Cart') }}</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">{{ trans('vi.Item') }}</td>
                            <td class="description"></td>
                            <td class="price">{{ trans('vi.Price') }}</td>
                            <td class="quantity">{{ trans('vi.Quantity') }}</td>
                            <td class="total">{{ trans('vi.Total') }}</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($cart as $item)
                        <tr id="cart-item-{{ $item->rowid }}">
                            <td class="cart_product">
                                <a href="{{ url('product/' . $item->options->slug) }}">
                                    @if ($item->options->image)
                                        <img class="img-cart-item" src="{{ asset('uploads/products/' . $item->options->image[0] . '/' . $item->options->image[1] . '/' . $item->options->image[2] . '/' . $item->options->image) }}" alt="{{ $item->name }}" />
                                    @endif
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ url('product/' . $item->options->slug) }}">{{ $item->name }}</a></h4>
                                <p>{{ trans('vi.SKU') }}: {{ $item->options->sku }}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{ $item->price }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">${{ $item->qty*$item->price }}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="javascript:void(0)" onclick="$.removeFromCart('{{ $item->rowid }}')" title="Remove Item"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if (count($cart) == 0)
                        <tr>
                            <td><p class="empty-cart">Your cart is empty! Click <a href="{{ url('/') }}">here</a> to continue shopping.</p></td>
                        </tr>
                    @endif
                    <tr id="cart-empty-message" style="display: none !important;">
                        <td><p class="empty-cart">Your cart is empty! Click <a href="{{ url('/') }}">here</a> to continue shopping.</p></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

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