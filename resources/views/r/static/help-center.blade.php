@extends('r.layouts.simple')
@section('content')
    <div class="helpcenter-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="title-page">Help center</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2">
                    <ul class="chapter-list">
                        <li><a href=""><span class="square"></span>My account</a></li>
                        <li><a href=""><span class="square"></span>Payments</a></li>
                        <li><a href=""><span class="square"></span>Packages</a></li>
                        <li><a href=""><span class="square"></span>Packages</a></li>
                        <li><a href=""><span class="square"></span>Other</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-6 col-xl-6 offset-xl-1">
                    <ul class="article-list">
                        <li><a href="{{route('user.help-center',0)}}">TV Shows & Movies</a></li>
                        <li><a href="{{route('user.help-center',0)}}">Your plan will determine</a></li>
                        <li><a href="{{route('user.help-center',0)}}">If you choose to remain a member of</a></li>
                        <li><a href="{{route('user.help-center',0)}}">Your plan will determine</a></li>
                        <li><a href="{{route('user.help-center',0)}}">If you choose to remain a member of</a></li>
                    </ul>
                    <div class="content-block-bottom">
                        <div class="title-page-add">No Answer ?</div>
                        <div class="text-add">Fill free to contact us</div>
                        <a href="{{route('user.contact')}}" class="butn btn-cta1b btn-lg">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection