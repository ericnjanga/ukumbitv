<div class="video-list-block">

    @foreach($videos as $video)
         
        <div class="video-item">
            <a href="{{route('single-video',$video->id)}}">
                <div class="video-img">
                    <img src="{{asset('r/img/video1.png')}}" alt="">
                </div>
                <div class="video-title ellipsis-gradient">{{$video->title}}
                </div>
            </a>
            <div class="video-info">
                <div class="video-genre">Drama</div>
                <div class="butn-like"><span class="icon icon-thumbs-up"></span>
                    <span class="likes-count">25</span>
                </div>
            </div>
        </div>
        
    @endforeach

</div>
