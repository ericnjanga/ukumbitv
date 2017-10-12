@extends('r.layouts.app')

@section('layout')
    <header class="landing-header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">{{trans('messages.toggle_navigation')}}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="ukb-navbar-brand navbar-brand" href="/"><img src="{{asset('r/img/logo.png')}}" alt="UkumbiTV" title="UkumbiTV"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{route('user.login.form')}}" class="btn btn-link btn-lg">{{trans('messages.auth_signin')}}</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="info-block hero-sub">
            <h1 class="title">{{$video->title}}</h1>
            <img src="{{$video->videoimage->imgPreview1}}" alt="">
            <div class="video-info-main">
                <div class="info-left">
                    <!-- <span class="age">16+</span> -->
                    <ul class="list-date-duration list-inline">
                        <li>{{$video->year}}</li>
                        <li class="bold">{{$video->country}}</li>
                    </ul>

                </div>
            </div>
        </div>


    </header>
    <main>
        @yield('content')
    </main>
    @include('r.chunks._footer_main')
@endsection