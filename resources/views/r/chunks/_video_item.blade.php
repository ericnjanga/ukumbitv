<figure class="video-item">
  <a href="{{route('user.singleVideo',$video->watchid)}}">
  	<span class="badge video-item__badge">{{trans('messages.new')}}</span>

    <div class="video-img">
      <img data-src="{{$video->videoimage->imgPreview1}}" class="lazyload" alt="{{$video->title}}">
    </div>
    <figcaption class="video-title ellipsis-gradient">{{$video->title}}
    </figcaption>
  </a>
  <div class="video-info">
    <div class="video-genre">{{$video->category->name}}</div>
    <div class="butn-like"><span class="icon icon-thumbs-up"></span><span class="likes-count">{{count($video->likes)}}</span></div>
  </div>
</figure>
 