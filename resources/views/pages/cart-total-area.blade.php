
<div class="total_area" id="cart-total-area">
    <ul>
        <li>{{ trans('vi.Cart Sub Total') }} <span>${{ $total }}</span></li>
        <li>{{ trans('vi.Shipping Cost') }} <span>{{ trans('vi.Free') }}</span></li>
        <li>{{ trans('vi.Total') }} <span>${{ $total }}</span></li>
    </ul>
    <a class="btn btn-default update" href="">{{ trans('vi.Update') }}</a>
    <a class="btn btn-default check_out" href="">{{ trans('vi.Check Out') }}</a>
</div>