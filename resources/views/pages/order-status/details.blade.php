@extends('layouts.default')

@section('title')
    {{ trans('lang.Order Status') }}
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
			<h4>Tracking your order here</h4>
			<p><i>Please enter your order code below. You will receive a status about your order.</i></p>

		    {!! Form::open(['method' => 'post', 'url' => 'order/getStatus', 'class' => 'order-status']) !!}
				
				<div class="form-group">
					<label for="order-code" class="sr-only">{{ trans('lang.Order') }} #:</label>
					<input type="text" name="order_code" class="form-control" id="order-code" placeholder="#: {{ trans('lang.your_order_code') }}">
				</div>
									
				<button type="submit" class="btn btn-primary">{{ trans('lang.Submit') }}</button>
								
		    {!! Form::close() !!}
		</div>
	</div>
</div>
@stop

@section('front-footer-content')
    
@endsection