<div class="header-wrap">
    <header>
        <div class="main-header page-header">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-sm-2 offset-sm-5">
                        <a href="{{route('user.dashboard')}}" class="logo-block">
                            <img src="{{asset('r/img/logo.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 offset-sm-1">
                        @if(\Auth::check())
                            <div class="login-block">
                                <div class="login-info">
                                    <div class="login-text">100 videos left</div>
                                    <a href="" class="login-upgrade">upgrade package</a>
                                </div>
                                <div class="img-block">
                                    <img src="{{asset('r/img/no-img.png')}}" alt="">
                                    <div class="account-block">
                                        <ul class="account-list">
                                            <li><a href="">My account</a></li>
                                            <li><a href="">Plan</a></li>
                                            <li><a href="{{route('user.logout')}}">Sign Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{--<div class="col-sm-1 offset-sm-2">--}}
                                {{--<a href="" class="butn butn-signin">Sign in</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-2">--}}
                                {{--<a href="" class="butn butn-free">Try free trial</a>--}}
                            {{--</div>--}}
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </header>
</div>