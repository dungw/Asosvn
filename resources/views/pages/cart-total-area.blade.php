
<div class="total_area" id="cart-total-area">
    <ul>
        <li>{{ trans('lang.Cart Sub Total') }} <span>{!! App\Helpers\Currency::currency($total) !!}</span></li>
        <li>{{ trans('lang.Shipping Cost') }} <span>{{ trans('lang.Free') }}</span></li>
        <li>{{ trans('lang.Total') }} <span>{!! App\Helpers\Currency::currency($total) !!}</span></li>
    </ul>
    <a class="btn btn-default update" href="#">{{ trans('lang.Continue shopping') }}</a>
    <a class="btn btn-default check_out" href="{{ url('checkout') }}">{{ trans('lang.Check Out') }}</a>
</div>