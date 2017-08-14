<header>
    <div class="landing-header">
        <div class="layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-2">
                    <div class="logo-block">
                        <img src="{{asset('r/img/logo.png')}}" alt="">
                    </div>
                </div>
                <div class="col-sm-1 offset-sm-7">
                    <a href="{{route('user.login.form')}}" class="butn butn-signin">{{l("Sing in")}}</a>
                </div>
                <div class="col-sm-2">
                    <a href="" class="butn butn-free">{{l("Try free trial")}}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5 offset-sm-1">
                    <div class="title-white">{{l("Watch great videos")}}</div>
                    <div class="title-white-add upper">{{l("Watch anywhere. enjoy your time")}}</div>
                    <div>
                        <a href="" class="butn butn-orange butn-large">{{l("Watch 10 videos for free")}}</a>
                    </div>
                </div>
                <div class="col-sm-1 offset-sm-3">
                    <div class="down-block">
                        <span class="icon icon-scroll-arrow-to-down"></span>
                        <div>{{l("Scroll down")}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>