@extends('r.layouts.user-search')
@section('content')
    <div class="list-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    @include('r.chunks._filter_video')
                </div>
                <div class="col-sm-10">
                    <div class="video-list-wrap">
                        <div class="title">My List</div>
                        <div class="filter-block-wrap">
                            <div class="filter-block">
                                @include('r.chunks._sort_by')
                            </div>
                            <div class="filter-block">
                                @include('r.chunks._filter_tags')
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
                            </div>
                            <a href="" class="butn butn-orange-white butn-large">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection