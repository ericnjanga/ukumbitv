@extends('r.layouts.user-search')
@section('content')
    <div class="list-wrap">
        <div class="container">
            <div class="clearfix">
            		@include('r.chunks._filter_video')
            		
                <div class="global-main-content">
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
                                @foreach($videos as $video)
                                        <div class="video-item">
                                            <a href="{{route('user.singleVideo',$video->watchid)}}">
                                                <div class="video-img">
                                                    <img src="{{$video->videoimage->imgPreview1}}" alt="">
                                                </div>
                                                <div class="video-title ellipsis-gradient">
                                                    {{$video->title}}
                                                </div>
                                            </a>
                                            <div class="video-info">
                                                <div class="video-genre">{{$video->category->name}}</div>
                                                <div class="butn-like"><span class="icon icon-thumbs-up"></span>
                                                    <span class="likes-count">{{count($video->likes)}}</span>
                                                </div>
                                            </div>
                                        </div> 
                                @endforeach
                            </div>
                            <a href="" class="butn btn-cta1 btn-lg">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection