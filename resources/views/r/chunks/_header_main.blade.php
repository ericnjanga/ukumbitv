<div class="header-wrap">
<header>
    <div class="landing-header">
        <div class="layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4 col-md-3 col-lg-2 col-xl-2">
                    <div class="logo-block">
                        <img src="{{asset('r/img/logo.png')}}" alt="">
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-1 col-xl-1 offset-sm-2 offset-md-4 offset-lg-7">
                    <a href="{{route('user.login.form')}}" class="butn butn-signin">{{l("Sign in")}}</a>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2 col-xl-2">
                    <a href="{{route('user.register.form')}}" class="butn butn-free">{{l("Try free trial")}}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xl-5 offset-xl-1">
                    <div class="title-white">{{l("Watch great videos")}}</div>
                    <div class="title-white-add upper">{{l("Watch anywhere. enjoy your time")}}</div>
                    <div>
                        <a href="{{route('user.register.form')}}" class="butn butn-orange butn-large">{{l("Watch 10 videos for free")}}</a>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1 offset-md-2 offset-lg-3">
                    <div class="down-block">
                        <span class="icon icon-scroll-arrow-to-down"></span>
                        <div>{{l("Scroll down")}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
</div>