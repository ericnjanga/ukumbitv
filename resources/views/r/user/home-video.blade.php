@extends('r.layouts.user-search')
@section('content')
    
  <div class="page-video-landing">  
    <div class="global-display">
			@include('r.chunks._filter_video')

			<div class="global-content"> 
	      <div class="hero">
	      	<img src="{{ $grandVideo->videoimage->imgHero }}" alt="{{ $grandVideo->title }}">
	      	<!-- <p>{{ $grandVideo }}</p> -->
	      	<ul class="fast-links list-inline">
	      		<li>
	      			<a href="{{route('user.singleVideo', $grandVideo->watchid)}}" class="btn btn-block btn-cta1b">
	      				<i class="fa fa-play" aria-hidden="true"></i> 
	      				{{trans('messages.watch_video')}}
	      			</a>
	      		</li>
	      		<li>
							<button class="btn btn-block btn-cta1b" onclick="addToList()">
								<i class="fa fa-bookmark" aria-hidden="true"></i>
								{{trans('messages.Add_to_list')}}
							</button> 
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
	          @if($my_lists->isEmpty())
	              <div class="block-msg">
	                  <div>{{trans('messages.empty_my_list')}}</div>
	                  {{--<p>Press <span class="icon icon-thumbs-up"></span> to like the video</p>--}}
	              </div>
	          @else

	              <div class="list-horizontal-wrapper">
	                  @foreach($my_lists as $video)
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
			</div><!-- global-content -->
    </div><!-- global-display -->
  </div>
  @include('r.chunks._video_item_popup')
     
@endsection


@section('scripts')
     
	<!-- ADD TO LIST -->
	<!-- (same script on "single-video.blade.php") -->
  <script> 
      function addToList() {

          var fd = new FormData;

          fd.append('_token', '{{csrf_token()}}');
          fd.append('id', '{{$video->id}}');


          $.ajax({
              type: 'POST',
              url: '{{route('user.add-to-playlist')}}',
              contentType: false,
              processData: false,
              data: fd,
              dataType: 'html',
              success: function(data){

                  var rep = JSON.parse(data);
                  swal({
                      title: rep.title,
                      text: rep.text,
                      type: rep.type,
                      html: true
                  });
              },
              error: function(data){
                  swal("Hmm", "Something went wrong, try again pls", "error");
              }
          });
      }
  </script>
@endsection