@extends('layouts.default')

@section('title')
    {{ trans('lang.Account') }}
@stop

@section('content')
    <div class="container account-dashboard">
        @include('pages.account.navbar')

        <div class="col-sm-8 col-sm-offset-1">
            {!! Form::open(['method' => 'post', 'url' => 'checkout/create', 'class' => 'form-inline']) !!}
                <div class="form-group col-sm-6">
                    <label for="accountName">{{ trans('lang.Name') }}</label>
                    <input type="text" name="name" class="form-control no-radius input-gray" id="accountName" value="{{ Auth::user()->name }}" disabled @if (!Auth::user()->password) disabled @endif>
                    {{--if user login with facebook or goole account will have no password, name is auto update when user change facebook or google name--}}
                </div>
                <div class="form-group col-sm-6">
                    <label for="accountEmail">{{ trans('lang.Email') }}</label>
                    <input type="email" name="email" class="form-control no-radius input-gray" id="accountEmail" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="col-sm-12" style="padding-top: 15px"></div>
                <div class="form-group col-sm-6">
                    <label for="accountPhone">{{ trans('lang.Phone') }}</label>
                    <input type="text" name="phone" class="form-control phone-number no-radius input-gray" id="accountPhone" value="{{ Auth::user()->phone }}" disabled>
                </div>
                <div class="form-group col-sm-6">
                    <label for="accountAddress">{{ trans('lang.Address') }}</label>
                    <textarea name="address" id="accountAddress" rows="3">
                        {{ Auth::user()->address }}
                    </textarea>
                </div>
                <button type="button" class="btn btn-primary update-account">{{ trans('lang.Update') }}</button>
                <button type="button" class="btn btn-primary cancel-update-account">{{ trans('lang.Cancel') }}</button>
                <button type="submit" class="btn btn-primary save-update-account">{{ trans('lang.Save') }}</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('front-footer-content')
    <script type="text/javascript">
        $( document).ready(function() {
            $(".phone-number").on("keydown", function(e) {
                if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode == 13 || e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 37 || e.keyCode == 39) {

                } else {
                    e.preventDefault();
                }
            });

            $(".update-account").on("click", function() {
                $(".account-dashboard input").removeAttr('disabled');
                $(".update-account").fadeOut(1);
                $(".cancel-update-account").fadeIn();
                $(".save-update-account").fadeIn();
            });
        });
    </script>
@stop