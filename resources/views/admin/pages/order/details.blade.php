<!-- Modal Order Details-->
<div class="modal fade order-details" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ trans('lang.Details Order') }}: #{{ $order->id }}</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer Information</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <th>{{ trans('lang.Name') }}</th>
                                <th>{{ trans('lang.Phone') }}</th>
                                <th>{{ trans('lang.Email') }}</th>
                                <th>{{ trans('lang.Address') }}</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                @if (trim($order->note) != '')
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Order Note</h3>
                        </div>
                        <div class="panel-body">
                            <p>{{ $order->note }}</p>
                        </div>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Items</h3>
                    </div>
                    <div class="panel-body">
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
                                    <td class="text-center">
                                        <a href="{{ url('product/' . $product->slug) }}" title="{{ $product->name }}">
                                            {{ $product->name  }}
                                        </a>
                                    </td>
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
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Extra Information</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <th>Deposit</th>
                            <th>Shipping Cost</th>
                            <th>Created At</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $order->deposit_value }}</td>
                                <td>{{ $order->shipping_cost }}</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
