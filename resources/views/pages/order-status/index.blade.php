@extends('layouts.default')

@section('title')
    {{ trans('lang.Order Status') }}
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
			<h4>Tracking your order here</h4>
			<p><i>Please enter your email address below. You will receive status about your order.</i></p>

		    {!! Form::open(['method' => 'post', 'url' => 'order/getStatus', 'class' => 'order-status']) !!}
				
				<div class="form-group">
					<input type="text" name="email" class="form-control" placeholder="{{ trans('lang.Email Address') }}">
					<button type="submit" class="btn btn-primary">{{ trans('lang.Submit') }}</button>
				</div>

		    {!! Form::close() !!}
		</div>
	</div>
</div>
@stop

@section('front-footer-content')
    
@endsection