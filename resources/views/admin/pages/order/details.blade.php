<!-- Modal Order Details-->
<div class="modal fade order-details" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open(['method' => 'PUT', 'url' => 'admin/order/' . $order->id]) !!}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ trans('lang.Details Order') }}: #{{ $order->id }}</h4>
                    <button class="inline-block btn btn-success" id="edit-order">Edit</button>
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
                                        <td class="view-only">{{ $order->name }}</td>
                                        <td class="editable hidden">
                                            <input type="text" name="name" class="form-control" value="{{ $order->name }}" placeholder="Name" required>
                                        </td>
                                        <td class="view-only">{{ $order->phone }}</td>
                                        <td class="editable hidden">
                                            <input type="text" name="phone" class="form-control" value="{{ $order->phone }}" placeholder="Phone" required>
                                        </td>
                                        <td class="view-only">{{ $order->email }}
                                        <td class="editable hidden">
                                            <input type="email" name="email" class="form-control" value="{{ $order->email }}" placeholder="Email" required>
                                        </td>
                                        <td class="view-only">{{ $order->address }}</td>
                                        <td class="editable hidden">
                                            <input type="text" name="address" class="form-control" value="{{ $order->address }}" placeholder="Address" required>
                                        </td>
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
                                <p class="view-only">{{ $order->note }}</p>
                                <textarea type="text" name="note" class="form-control editable hidden">
                                    {{ $order->note }}
                                </textarea>
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
                                        {{--<td class="text-center">{!! App\Helpers\Currency::currency($item->price) !!}</td>--}}
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
                                <th>Status</th>
                                <th>Created At</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="view-only">{{ $order->deposit_value }}</td>
                                    <td class="editable hidden">
                                        <input type="text" name="deposit_value" class="form-control" value="{{ $order->deposit_value }}" placeholder="Deposit">
                                    </td>
                                    <td class="view-only">{{ $order->shipping_cost }}</td>
                                    <td class="editable hidden">
                                        <input type="text" name="shipping_cost" class="form-control" value="{{ $order->shipping_cost }}" placeholder="Shipping Cost">
                                    </td>
                                    <td class="view-only">{{ $order->status }}</td>
                                    <td class="editable hidden">
                                        <select class="form-control" name="status">
                                            <option value="pending" @if($order->status == 'pending') selected @endif>
                                                Pending
                                            </option>
                                            <option value="deposit" @if($order->status == 'deposit') selected @endif>
                                                Deposit
                                            </option>
                                            <option value="processing" @if($order->status == 'processing') selected @endif>
                                                Processing
                                            </option>
                                            <option value="shipping" @if($order->status == 'shipping') selected @endif>
                                                Shipping
                                            </option>
                                            <option value="complete" @if($order->status == 'complete') selected @endif>
                                                Complete
                                            </option>
                                            <option value="canceled" @if($order->status == 'canceled') selected @endif>
                                                Canceled
                                            </option>
                                        </select>
                                    </td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <span class="detail-total">
                        {{--<strong>{{ trans('lang.Total') }}: {!! App\Helpers\Currency::currency($order->total_amount) !!}</strong>--}}
                    </span>
                    <button type="submit" class="btn btn-primary center-block editable hidden">Save Changes</button>
                    <button type="button" class="btn btn-default close-modal-order view-only" data-dismiss="modal">{{ trans('lang.Close') }}</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.close-modal-order').on('click', function() {
            $('#order-details').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });

        $('#edit-order').on('click', function(e) {
            e.preventDefault();
            $('.view-only').addClass('hidden');
            $('.editable').removeClass('hidden');
        });
    });
</script>
