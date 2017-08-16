@extends('r.layouts.user-search')
@section('content')
    <div class="search-main-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    @include('r.chunks._filter_video')
                </div>
                <div class="col-sm-10">
                    <div class="video-list-wrap">
                        <div class="title"><span>Search:</span> Transformers</div>
                        <div class="filter-block-wrap">
                            <div class="filter-block">
                                <span>Sort by:</span>
                                <a href="">all</a>
                                <a href="">popular</a>
                                <a href="">hight rate</a>
                                <a href="">year released</a>
                                <a href="">A-z</a>
                                <a href="">Z-a</a>
                            </div>
                            <div class="filter-block">
                                <span>Tags:</span>
                                <a href="">all</a>
                                <a href="">action</a>
                                <a href="">drama</a>
                                <a href="">romance</a>
                                <a href="">suspense</a>
                                <a href="">horror</a>
                                <a href="">drama</a>
                            </div>
                        </div>
                        <div class="video-list-block-wrap">
                            <div class="video-list-block">
                                @for($row=1;$row<4;$row++)
                                    @for($i=1;$i<6;$i++)
                                        <div class="video-item-block">
                                            <div class="video-item">
                                                <a href="{{route('single-video',0)}}">
                                                    <div class="video-img">
                                                        <img src="{{asset('r/img/video'.$i.'.png')}}" alt="">
                                                    </div>
                                                    <div class="video-title ellipsis-gradient">Transformers: Revenge of the
                                                        Fallen
                                                    </div>
                                                </a>
                                                <div class="video-info">
                                                    <div class="video-genre">Drama</div>
                                                    <div class="butn-like"><span class="icon icon-thumbs-up"></span>25
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @endfor

                            <a href="" class="butn butn-orange-white butn-large">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection