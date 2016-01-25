@extends('layouts.default')

@section('title')
    {{ trans('lang.Account') }}
@stop

@section('content')
    <section id="form">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-1">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ trans('lang.' . $error) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <h2>{{ trans('lang.Login to your account') }}</h2>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/account/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            <input type="password" class="form-control" name="password" placeholder="{{ trans('lang.Password') }}" required>
							<span>
                                <input type="checkbox" name="remember" id="remember-signed-in">
								<span for="remember-signed-in">{{ trans('lang.Keep me signed in') }}</span>
							</span>
                            <button type="submit" class="btn btn-default">{{ trans('lang.Login') }}</button>
                            <a class="btn btn-link no-padding forgot-link" href="{{ url('/password/email') }}">{{ trans('lang.Forgot Your Password?') }}</a>
                        </form>
                    </div>
                    <a href="{{ url('facebook/auth') }}">{{ trans('lang.Login With Facebook') }}</a>
                    <br/>
                    <a href="{{ url('google/auth') }}">{{ trans('lang.Login With Google') }}</a>
                </div>
                <div class="col-sm-1">
                    <h2 class="or">{{ trans('lang.OR') }}</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <h2>{{ trans('lang.New User Signup!') }}</h2>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ trans('lang.Name') }}" required>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('lang.Email Address') }}" required>
                            <input type="password" class="form-control" name="password" placeholder="{{ trans('lang.Password') }}" required>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('lang.Password Confirmation') }}" required>
                            <button type="submit" class="btn btn-default">{{ trans('lang.Signup') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
