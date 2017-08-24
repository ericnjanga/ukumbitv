<div class="video-item-block">
    <div class="video-item">
        <a href="{{route('user.singleVideo',$video->watchid)}}">
            <div class="video-img">
                <img src="{{asset('r/img/video1.png')}}" alt="">
            </div>
            <div class="video-title ellipsis-gradient">{{$video->title}}
            </div>
        </a>
        <div class="video-info">
            <div class="video-genre">{{$video->category->name}}</div>
            <div class="butn-like"><span class="icon icon-thumbs-up"></span><span class="likes-count">{{$video->admin_video_id}}</span></div>
        </div>
    </div>
</div>