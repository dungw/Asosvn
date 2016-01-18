
<div class="total_area" id="cart-total-area">
    <ul>
        <li>{{ trans(\App\Helpers\Locale::lang() . '.Cart Sub Total') }} <span>{!! App\Helpers\Currency::currency($total) !!}</span></li>
        <li>{{ trans(\App\Helpers\Locale::lang() . '.Shipping Cost') }} <span>{{ trans(\App\Helpers\Locale::lang() . '.Free') }}</span></li>
        <li>{{ trans(\App\Helpers\Locale::lang() . '.Total') }} <span>{!! App\Helpers\Currency::currency($total) !!}</span></li>
    </ul>
    <a class="btn btn-default update" href="#">{{ trans(\App\Helpers\Locale::lang() . '.Continue shopping') }}</a>
    <a class="btn btn-default check_out" href="#">{{ trans(\App\Helpers\Locale::lang() . '.Check Out') }}</a>
</div>