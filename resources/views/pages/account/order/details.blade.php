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
                        <th>{{ trans('lang.SKU') }}</th>
                        <th>{{ trans('lang.Image') }}</th>
                        <th>{{ trans('lang.Quantity') }}</th>
                        <th>{{ trans('lang.Price') }}</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close-modal-order" data-dismiss="modal">Close</button>
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
