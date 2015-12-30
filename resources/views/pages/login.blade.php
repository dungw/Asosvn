@extends('layouts.default')

@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="login-form">
                        <!--login form-->
                        <h2>Login to your account</h2>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                            <input type="password" class="form-control" name="password" placeholder="Password">
							<span>
                                <input type="checkbox" name="remember" class="checkbox">
								Keep me signed in
							</span>
                            <button type="submit" class="btn btn-default">Login</button>
                            <a class="btn btn-link no-padding" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                        </form>
                        <!--/login form-->
                    </div>
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                        <!--/sign up form-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
