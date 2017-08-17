<div class="header-wrap">
<header>
    <div class="main-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-2">
                    <a href="/" class="logo-block">
                        <img src="{{asset('r/img/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="col-sm-6">
                    <form action="{{route('search-all')}}">
                        <div class="input-wrap search-wrap">
                            <input type="search" name="key" placeholder="Titles, people, tags">
                            <div class="search-list-block">
                                <ul class="search-list">
                                    <li><a href="">Titles, people, tags</a></li>
                                    <li><a href="">Titles, people, tags</a></li>
                                    <li><a href="">Titles, people, tags</a></li>
                                    <li><a href="">Titles, people, tags</a></li>
                                    <li><a href="">Titles, people, tags</a></li>
                                    <li><a href="">Titles, people, tags</a></li>
                                </ul>
                            </div>
                            <button type="submit" class="butn-search">
                                <span class="icon icon-magnifying-glass"></span>
                            </button>
                        </div>
                    </form>

                </div>
                <div class="col-sm-4">
                    <div class="login-block">
                        <div class="login-info">
                            <div class="login-text">100 videos left</div>
                            <a href="{{route('user.package')}}" class="login-upgrade">upgrade package</a>
                        </div>
                        <div class="img-block">
                        <img src="{{asset('r/img/no-img.png')}}" alt="">
                            <div class="account-block">
                                <ul class="account-list">
                                    <li><a href="{{route('user.account')}}">My account</a></li>
                                    <li><a href="{{route('user.package')}}">Plan</a></li>
                                    <li><a href="{{route('user.logout')}}">Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
</div>