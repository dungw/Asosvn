@extends('layouts.default')

@section('title')
    {{ trans('lang.Account') }}
@stop

@section('content')
    <div class="container account-dashboard">
        @include('pages.account.navbar')

        <div class="col-sm-9 account-content">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ trans('lang.' . $error) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="shopper-info">
            {!! Form::open(['method' => 'post', 'url' => 'account/update']) !!}
                <input type="text" name="name" id="accountName" value="{{ Auth::user()->name }}" data-name="{{ Auth::user()->name }}" @if (!Auth::user()->password) disabled @endif placeholder="{{ trans('lang.Name') }}">
                {{--if user login with facebook or goole account will have no password, name is auto update when user change facebook or google name--}}
                <input type="email" name="email" id="accountEmail" value="{{ Auth::user()->email }}" data-email="{{ Auth::user()->email }}" @if (!Auth::user()->password) disabled @endif placeholder="{{ trans('lang.Email') }}">
                {{--if user login with facebook or goole account will have no password, canot update email--}}
                <input type="text" name="phone" id="accountPhone" value="{{ Auth::user()->phone }}" data-phone="{{ Auth::user()->phone }}" placeholder="{{ trans('lang.Phone') }}">
                <textarea name="address" id="accountAddress" rows="3" placeholder="{{ trans('lang.Address') }}">{{ Auth::user()->address }}</textarea>

                <button type="submit" class="btn btn-primary update-account">{{ trans('lang.Update') }}</button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('front-footer-content')
    <script type="text/javascript">
        $( document).ready(function() {
            $("#accountPhone").on("keydown", function(e) {
                if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode == 13 || e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 37 || e.keyCode == 39) {

                } else {
                    e.preventDefault();
                }
            });
        });
    </script>
@stop