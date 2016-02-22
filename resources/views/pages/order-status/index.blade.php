@extends('layouts.default')

@section('title')
    {{ trans('lang.Order Status') }}
@stop

@section('content')
<div class="container">
	<div class="row tracking-order">
		<div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
			<h4>{{ trans('lang.tracking_your_order_here') }}</h4>
			<p>
				<i>{{ trans('lang.please_enter_your_email_address_below') }}. {{ trans('lang.you_will_receive_status_about_your_order') }}.</i>
			</p>

			@if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ trans('lang.' . $error) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

		    {!! Form::open(['method' => 'post', 'url' => 'order/getStatus', 'class' => 'order-status']) !!}
				
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="{{ trans('lang.Email Address') }}" required
						value="{{ isset($old_email) ? $old_email : null }}">					
				</div>

				<button type="submit" class="btn btn-primary center-block">{{ trans('lang.Show') }}</button>

		    {!! Form::close() !!}

		    @yield('order-status')	
		</div>
	</div>
</div>
@stop

@section('front-footer-content')
    <script type="text/javascript">
    	$(function() {
			$('input[name=email]').focus();
    	});
    </script>
@endsection