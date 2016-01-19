<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>Sale</span>-Zone</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('images/home/iframe1.png') }}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('images/home/iframe2.png') }}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('images/home/iframe3.png') }}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('images/home/iframe4.png') }}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="{{ asset('images/home/map.png') }}" alt="map" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2>{{ trans('lang.Service') }}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">{{ trans('lang.Contact') }}</a></li>
                            <li><a href="#">{{ trans('lang.Order Status') }}</a></li>
                            <li><a href="#">{{ trans('lang.FAQ’s') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2>{{ trans('lang.Categories') }}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ url('c/' . $category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>{{ trans('lang.Policies') }}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">{{ trans('lang.Terms of Use') }}</a></li>
                            <li><a href="#">{{ trans('lang.Privacy Policy') }}</a></li>
                            <li><a href="#">{{ trans('lang.Refund Policy') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>{{ trans('lang.Newsletter') }}</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="{{ trans('lang.Your email address') }}" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>{{ trans('lang.Get the most recent updates') }}</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">{{ trans('lang.Copyright') }} © 2016 Sale-Zone.vn. {{ trans('lang.All rights reserved') }}.</p>
            </div>
        </div>
    </div>

</footer>
