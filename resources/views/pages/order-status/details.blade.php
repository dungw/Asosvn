@extends('pages.order-status.index')

@section('order-status')

	<div class="tracking-order-result">
	    @if (count($orders))
		<div class="table-responsive">
			<table class="table table-bordered">
			 	<thead>
			  		<th>#</th>
			  		<th>Shipping Status</th>
			  		<th>Status</th>
			  	</thead>
			  	<tbody>		
			  		@foreach ($orders as $order)
			  			<tr class="@if($order->status == 'pending') active @elseif(in_array($order->status, array('shipping', 'processing', 'deposit'))) info
			  				@elseif($order->status == 'complete') success @elseif($order->status == 'canceled') danger @else @endif">
			  				<td>{{ $order->id }}</td>
							<td></td>	
							<td>{{ ucfirst(trans('lang.' . $order->status)) }}</td>
			  			</tr>	
			  		@endforeach
			  	</tbody>
			</table>
		</div>
		@else 
			<p><i>{{ trans('lang.no_order_match') }}</i></p>
		@endif
	</div>

@stop



		    
