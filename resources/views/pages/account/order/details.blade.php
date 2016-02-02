<!-- Modal Order Details-->
<div class="modal fade order-details" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ trans('lang.Details Order') }}: #{{ $order->id }}</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <th class="text-center">{{ trans('lang.SKU') }}</th>
                        <th class="text-center">{{ trans('lang.Product name') }}</th>
                        <th class="text-center">{{ trans('lang.Image') }}</th>
                        <th class="text-center">{{ trans('lang.Quantity') }}</th>
                        <th class="text-center">{{ trans('lang.Price') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <?php $product = \App\Product::find($item->product_id) ?>
                            <tr>
                                <td class="text-center">{{ $product->sku  }}</td>
                                <td class="text-center">{{ $product->name  }}</td>
                                <td class="text-center">
                                    @if (file_exists(\App\Helpers\ImageManager::getThumb($product->mainImage()->image, 'product', 'small')))
                                        <a href="{{ url('product/' . $product->slug) }}" title="{{ $product->name }}">
                                            <img src="{{ asset(\App\Helpers\ImageManager::getThumb($product->mainImage()->image, 'product', 'small') ) }}" alt="{{ $product->name }}"/>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-center">{!! App\Helpers\Currency::currency($item->price) !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <span class="detail-total">
                    <strong>{{ trans('lang.Total') }}: {!! App\Helpers\Currency::currency($order->total_amount) !!}</strong>
                </span>
                <button type="button" class="btn btn-default close-modal-order" data-dismiss="modal">{{ trans('lang.Close') }}</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".close-modal-order").on("click", function() {
            $('#order-details').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });
    });
</script>
