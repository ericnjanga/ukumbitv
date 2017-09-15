@extends('r.layouts.user-search')
@section('content')
    <div class="list-wrap">
        <div class="container">
            <div class="clearfix">
            		@include('r.chunks._filter_video')
            		
                <div class="global-display">
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
                                @if(count($videos) == 0)
                                    <h1>{{trans('messages.There_is_no_videos')}}</h1>
                                @else
                                    @foreach($videos as $video)
                                      @include('r.chunks._video_item')
                                    @endforeach
                                @endif
                            </div>
                            <a href="" class="butn btn-cta1 btn-lg">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection