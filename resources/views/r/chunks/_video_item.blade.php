<figure class="video-item ruby-hover @if($video->created_at->between(\Carbon\Carbon::now(), \Carbon\Carbon::now()->subDays(7))) new @endif">
  <a href="{{route('user.singleVideo',$video->watchid)}}" class="video-item__frame">
  	<span class="badge video-item__badge">{{trans('messages.new')}}</span>
  	<span class="video-item__resume">{{mb_substr($video->description , 0,235)}} ...</span>
		<img data-src="{{$video->videoimage->imgPreview1}}" class="lazyload video-item__img" alt="{{$video->title}}"> 
  </a>
  
  <figcaption class="video-item__title ellipsis-gradient">{{$video->title}}
  </figcaption>
  <div class="video-item__info">
    <div class="video-genre">{{$video->category->name}}</div>
    <div class="butn-like"><span class="icon icon-thumbs-up"></span><span class="likes-count">{{count($video->likes)}}</span></div>
  </div>
</figure>
