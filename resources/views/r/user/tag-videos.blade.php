@extends('r.layouts.user-search')
@section('content')
    <div class="tagvideo-wrap">
        <div class="container">
            <div class="clearfix">
            		@include('r.chunks._filter_video')
                 
                <div class="global-display">
                    <div class="video-list-wrap">
                        <div class="title">
                          <div class="butn-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                          </div>
                          Tom Cruse video</div>
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
                                        @include('r.chunks._video_item')
                                    @endfor
                                @endfor
                            </div>
                            <a href="" class="butn btn-cta1 btn-lg">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection