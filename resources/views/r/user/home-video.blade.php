@extends('r.layouts.user-search')
@section('content')
    
    <div class="container-fluid"> 
    		@include('r.chunks._filter_video')
         
        <div class="global-main-content">
            <div class="main-top-block">
                <img src="{{ asset('r/img/bg-video.png')}}" alt="">
                <div class="layer"></div>
                <div class="video-info-block">
                    <div class="video-title">Ghost in the Shell</div>
                    <div class="video-info-text">
                        <span class="age">16+</span>
                        <span class="date">March 2017</span>
                        <span class="genre">Drama, Comedy, Triller</span>
                        <div class="series-text">1 Season, 12 Series</div>
                    </div>
                    <div class="actors-block">
                        <div class="actors-title">Actors</div>
                        <p class="actors-list">Scarlett Johansson, Beat Takeshi Kitano, Michael Carmen Pitt,
                            Pilou Asbaek, Chin Han, Juliette Binoche</p>
                    </div>
                    <div class="butn-block">
                        <div class="play-block">
                            <a href="https://www.youtube.com/embed/Rg6awBglzGU?autoplay=1"
                               class="butn butn-orange-dark butn-play upper cb-video"><span
                                        class="icon icon-play-arrow"></span>Play</a>
                            <a href="" class="butn butn-orange-dark upper">Add to list</a>
                        </div>
                        <div class="share-block">
                            <a href="" class="butn-share"><span>f</span>Share</a>
                            <a href="" class="butn-like"><span class="icon icon-thumbs-up"></span>158</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-wrap">
                <h2 class="single-title-link">
                	<a href="" class="title-link">New Videos</a>
                </h2> 
                  <div class="list-horizontal-wrapper">
                      @foreach($recent_videos as $video)
                          @include('r.chunks._video_item')
                      @endforeach 
                  </div> 
            </div>
            <div class="block-wrap">
                <h2 class="single-title-link">
                	<a href="" class="title-link">My List</a>
                </h2>  
                @if($watch_lists->isEmpty())
                    <div class="no-video">
                        <div>{{trans('messages.empty_my_list')}}</div>
                        {{--<p>Press <span class="icon icon-thumbs-up"></span> to like the video</p>--}}
                    </div>
                @else

                    <div class="list-horizontal-wrapper">
                        @foreach($watch_lists as $video)
                            @include('r.chunks._video_item')
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="block-wrap">
                <h2 class="single-title-link">
                	<a href="" class="title-link">Popular Videos</a>
                </h2>  
                
                <div class="list-horizontal-wrapper">
                    @foreach($trendings as $video)
                        @include('r.chunks._video_item')
                    @endforeach
                </div>
            </div>
            <div class="block-wrap">
                <h2 class="single-title-link">
                	<a href="" class="title-link">Liked Videos</a>
                </h2>  
                
                <div class="no-video">
                    <div>No liked videos yet</div>
                    <p>Press <span class="icon icon-thumbs-up"></span> to like the video</p>
                </div>
            </div>
        </div> 
    </div>
    @include('r.chunks._video_item_popup')
     
@endsection