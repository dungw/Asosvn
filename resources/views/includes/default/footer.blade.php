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
                                    <img src="images/home/iframe1.png" alt="" />
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
                                    <img src="images/home/iframe2.png" alt="" />
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
                                    <img src="images/home/iframe3.png" alt="" />
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
                                    <img src="images/home/iframe4.png" alt="" />
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
                        <img src="images/home/map.png" alt="" />
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
                        <h2>{{ trans('vi.Service') }}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">{{ trans('vi.Contact') }}</a></li>
                            <li><a href="#">{{ trans('vi.Order Status') }}</a></li>
                            <li><a href="#">{{ trans('vi.FAQ’s') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2>{{ trans('vi.Categories') }}</h2>
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
                        <h2>{{ trans('vi.Policies') }}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">{{ trans('vi.Terms of Use') }}</a></li>
                            <li><a href="#">{{ trans('vi.Privacy Policy') }}</a></li>
                            <li><a href="#">{{ trans('vi.Refund Policy') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>{{ trans('vi.Newsletter') }}</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="{{ trans('vi.Your email address') }}" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>{{ trans('vi.Get the most recent updates') }}</p>
                        </form>
                    </div>
                    <div class="fb-like" data-href="{{ url(Request::url()) }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="false"></div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">{{ trans('vi.Copyright') }} © 2016 Sale-Zone.vn. {{ trans('vi.All rights reserved') }}.</p>
            </div>
        </div>
    </div>

</footer>
