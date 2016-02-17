@extends('layouts.default')

@section('title')
    {{ trans('lang.Contact') }}
@stop

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('includes.default.left-sidebar')
                </div>

                <div class="col-sm-9">
                    <div class="col-sm-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger center-block">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-center">{{ trans('lang.' . $error) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    {!! Form::open(['method' => 'post', 'url' => 'contact/create']) !!}
                    <div class="form-group">
                        <label for="name">{{ trans('lang.Name') }}</label>
                        <input type="text" name="name" class="form-control" id="name" @if (Auth::user())
                               value="{{ Auth::user()->name }}" @endif placeholder="{{ trans('lang.Name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ trans('lang.Email') }}</label>
                        <input type="email" name="email" class="form-control" id="email" @if (Auth::user())
                               value="{{ Auth::user()->email }}" @endif placeholder="{{ trans('lang.Email') }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="content">{{ trans('lang.Content') }}</label>
                        <textarea name="content" class="form-control" id="content" rows="6"
                                  placeholder="{{ trans('lang.Your comment') }}..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary center-block">{{ trans('lang.Submit') }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
	
@stop
