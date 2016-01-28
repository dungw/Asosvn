@extends('layouts.default')

@section('title')
    {{ trans('lang.Manager Order') }}
@stop

@section('content')
    <div class="container account-dashboard">
        @include('pages.account.navbar')

        <div class="col-sm-9 account-content">
            @if (count($orders))
            <table class="table table-hover account-order">
                <thead>
                    <th>{{ trans('lang.Order Code') }}</th>
                    <th>{{ trans('lang.Total Amount') }}</th>
                    <th>{{ trans('lang.Order At') }}</th>
                    <th>{{ trans('lang.Details') }}</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{!! App\Helpers\Currency::currency($order->total_amount) !!}</td>
                            <td>
                                @if (App::getLocale() == 'vi')
                                    {{ date('d-m-Y', strtotime($order->created_at)) }}
                                @else
                                    {{ date('m-d-Y', strtotime($order->created_at)) }}
                                @endif

                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="$.showOrderDetail('{{ $order->id }}')">
                                    {{ trans('lang.Show') }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p class="text-center">{{ trans('lang.You have no order!') }}</p>
            @endif
        </div>
    </div>

    <div id="modal-order-detail"></div>
@stop

@section('front-footer-content')
    <script type="text/javascript">
        $(document).ready(function() {
            var url = '{{ Config::get('app.url')}}';
            $.showOrderDetail = function(orderId) {
                $.get(url+ 'order/' + orderId, function(data) {
                    $("#modal-order-detail").html(data);
                    $(".order-details").modal('show');
                });
            }
        });
    </script>
@endsection