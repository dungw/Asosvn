@extends('layouts.default')

@section('title')
    {{ trans('lang.Contact') }}
@stop

@section('head')
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
      var mapProp = {
        center:new google.maps.LatLng(21.0076406,105.791612),
        zoom:14,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('includes.default.left-sidebar')
                </div>

                <div class="col-sm-9">
                    <div class="col-sm-12 col-md-12">
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
               
                    <div class="col-sm-4 col-md-4">
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

                    <div class="col-sm-4 col-md-4">                        
                        <p>Mr.Dung: 012345789</p>
                        <p>Mr.Thep: 012345789</p>
                        <p>Email: <a href="mailto:salezone.vn@gmail.com">salezone.vn@gmail.com</a></p>
                        <address>No.9999 Tran Duy Hung, Ha Noi</address>
                    </div>

                    <div id="googleMap" class="col-sm-4 col-md-4" style="width:33.3%; height:300px"></div>
                </div>
            </div>
        </div>
    </section>
	
@stop
