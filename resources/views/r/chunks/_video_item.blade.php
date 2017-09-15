<figure class="video-item" style="border:1px solid lime;">
    <a href="{{route('user.singleVideo',$video->watchid)}}">
        <div class="video-img">
            <img src="{{$video->videoimage->imgPreview1}}" alt="">
        </div>
        <div class="video-title ellipsis-gradient">{{$video->title}}
        </div>
    </a>
    <div class="video-info">
        <div class="video-genre">{{$video->category->name}}</div>
        <div class="butn-like"><span class="icon icon-thumbs-up"></span><span class="likes-count">{{count($video->likes)}}</span></div>
    </div>
</figure>
