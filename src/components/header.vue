<template>
    <div class="header-wrap">

        <header v-if="$route.name === 'about'">
            <div class="main-header page-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-2 offset-sm-5">
                            <a href="/" class="logo-block">
                                <img src="~@/assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-sm-1 offset-sm-2">
                            <a href="" class="butn butn-signin">Sing in</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="" class="butn butn-free">Try free trial</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <header v-else-if="$route.name === 'privacy' || $route.name === 'signin' || $route.name === 'signup' || $route.name === 'resetpas' || $route.name === 'checkmail' || $route.name === 'newpas' || $route.name === 'contact' || $route.name === 'jobs' || $route.name === 'job' || $route.name === 'help' || $route.name === 'helpcenter'">
            <div class="main-header page-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-2 offset-sm-5">
                            <a href="/" class="logo-block">
                                <img src="~@/assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-sm-4 offset-sm-1">
                            <div class="login-block">
                                <div class="login-info">
                                    <div class="login-text">100 videos left</div>
                                    <a href="" class="login-upgrade">upgrade package</a>
                                </div>
                                <div class="img-block">
                                    <span class="icon icon-man-user icon-no-photo"></span>
                                    <div class="account-block">
                                        <ul class="account-list">
                                            <li><a href="">My account</a></li>
                                            <li><a href="">Plan</a></li>
                                            <li><a href="">Sign Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <header v-else-if="$route.name === 'confirmmail'">
            <div class="main-header page-header">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="/" class="logo-block">
                                <img src="~@/assets/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <header v-else-if=" $route.name == 'category' || $route.name == 'list' || $route.name == 'main' || $route.name == 'search' || $route.name == 'tagvideo' || $route.name == 'video' || $route.name == 'myaccount' || $route.name == 'mypackage'">
            <div class="main-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <a href="/" class="logo-block">
                                <img src="~@/assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-wrap search-wrap">
                                <input type="search" name="searchvideo" placeholder="Titles, people, tags">
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
                                <button class="butn-search">
                                    <span class="icon icon-magnifying-glass"></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="login-block">
                                <div class="login-info">
                                    <div class="login-text">100 videos left</div>
                                    <a href="" class="login-upgrade">upgrade package</a>
                                </div>
                                <div class="img-block">
                                    <span class="icon icon-man-user icon-no-photo"></span>
                                    <!--<img src="~@/assets/img/no-img.png" alt="">-->
                                    <div class="account-block">
                                        <ul class="account-list">
                                            <li><a href="">My account</a></li>
                                            <li><a href="">Plan</a></li>
                                            <li><a href="">Sign Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <header v-else>
            <div class="landing-header">
                <div class="layer"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <a href="/" class="logo-block">
                                <img src="~@/assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-sm-1 offset-sm-7">
                            <a href="" class="butn butn-signin">Sing in</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="" class="butn butn-free">Try free trial</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 offset-sm-1">
                            <div class="title-white">Watch great videos</div>
                            <div class="title-white-add upper">Watch anywhere. enjoy your time</div>
                            <div>
                                <a href="" class="butn butn-orange butn-large">Watch 10 videos for free</a>
                            </div>
                        </div>
                        <div class="col-sm-1 offset-sm-3">
                            <div class="down-block">
                                <span class="icon icon-scroll-arrow-to-down"></span>
                                <div>Scroll down</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    </div>

</template>
