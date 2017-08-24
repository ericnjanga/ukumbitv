<div class="header-wrap">
<header>
    <div class="main-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4 col-md-3 col-lg-2 col-xl-2">
                    <a href="/" class="logo-block">
                        <img src="{{asset('r/img/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-7 col-xl-6 search-block">
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
                            <button id="butn-search" type="submit" class="butn-search">
                                <span class="icon icon-magnifying-glass"></span>
                            </button>
                        </div>
                    </form>

                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-4">
                    <h1><a href="{{route('user.reset-trial')}}">RESET TRIAL</a></h1>
                    @include('r.chunks._login_block')
                </div>
            </div>
        </div>
    </div>
</header>
</div>