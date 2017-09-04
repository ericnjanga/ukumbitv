@extends('r.layouts.user-search')
@section('content')
    
  <div class="container-fluid page-video-landing"> 
		@include('r.chunks._filter_video')
     
    <div class="global-main-content">
      <div class="hero">
      	<img src="{{ $grandVideo->videoimage->imgBillboard }}" alt="{{ $grandVideo->title }}">
      	<p>{{ $grandVideo }}</p>
      	<ul class="fast-links list-inline">
      		<li>
      			<a href="{{route('user.singleVideo', $grandVideo->watchid)}}" class="btn btn-block btn-cta1b">
      				<i class="fa fa-play" aria-hidden="true"></i> 
      				{{trans('messages.watch_video')}}
      			</a>
      		</li>
      		<li>
      			<a href="#" class="btn btn-block btn-cta1b">
      				<i class="fa fa-plus" aria-hidden="true"></i> 
      				{{trans('messages.Add_to_list')}}
      			</a>
      		</li>
      	</ul>
      </div><!-- hero -->

      <div class="block-wrap">
        <h2>New Videos</h2> 
        <div class="list-horizontal-wrapper">
            @foreach($recent_videos as $video)
                @include('r.chunks._video_item')
            @endforeach 
        </div> 
      </div>

      <div class="block-wrap">
          <h2>My List</h2>  
          @if($watch_lists->isEmpty())
              <div class="block-msg">
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
          <h2>Popular Videos</h2>  
          
          <div class="list-horizontal-wrapper">
              @foreach($trendings as $video)
                  @include('r.chunks._video_item')
              @endforeach
          </div>
      </div>

      <div class="block-wrap">
          <h2>Liked Videos</h2>  
          
          <div class="block-msg">
              <div>No liked videos yet</div>
              <p>Press <span class="icon icon-thumbs-up"></span> to like the video</p>
          </div>
      </div>
    </div><!-- global-main-content -->
  </div>
  @include('r.chunks._video_item_popup')
     
@endsection