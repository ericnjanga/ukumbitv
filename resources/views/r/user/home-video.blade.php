@extends('r.layouts.user-search')
@section('content')
    
  <div class="page page-video-landing">  
   <!--  <div class="global-display"> -->
    	<!-- @include('r.chunks._filter_video') -->

			<!-- <div class="global-content"> -->
				@if(isset($grandVideo))
	      <header class="hero">
	      	<img data-src="{{ $grandVideo->videoimage->imgHero }}" class="lazyload" alt="{{ $grandVideo->title }}"> 
	      	<ul class="fast-links list-inline">
	      		<li>
	      			<a href="{{route('user.singleVideo', $grandVideo->watchid)}}" class="btn btn-block btn-cta1b">
	      				<i class="fa fa-play" aria-hidden="true"></i> 
	      				{{trans('messages.watch_video')}}
	      			</a>
	      		</li>
	      		<li>
							<button class="btn btn-block btn-transparent1" onclick="addToList()">
								<i class="fa fa-plus" aria-hidden="true"></i>
								{{trans('messages.plus_my_list')}}
							</button> 
	      		</li>
	      	</ul>
	      </header><!-- hero -->
				@endif

	      <section class="block-wrap">
	        <h2>{{trans('messages.new_videos')}}</h2> 
	        <div class="list-horizontal-wrapper">
                @if(isset($recent_videos))
            @foreach($recent_videos as $video)
              @include('r.chunks._video_item')
            @endforeach
                    @endif
	        </div> 
	      </section>

	      <section class="block-wrap"> 
        	<h2>{{trans('messages.dramas')}}</h2>
          <div class="list-horizontal-wrapper">
              @if(isset($dramaVideos))
            @foreach($dramaVideos as $video)
              @include('r.chunks._video_item')
            @endforeach
                  @endif
          </div>
	      </section>

	      <section class="block-wrap"> 
        	<h2>{{trans('messages.comedies')}}</h2>
          <div class="list-horizontal-wrapper">
              @if(isset($comedyVideos))
            @foreach($comedyVideos as $video)
              @include('r.chunks._video_item')
            @endforeach
                  @endif
          </div>
	      </section>

	      <section class="block-wrap"> 
        	<h2>{{trans('messages.popular_videos')}}</h2>
          <div class="list-horizontal-wrapper">
              @if(isset($trendings))
            @foreach($trendings as $video)
              @include('r.chunks._video_item')
            @endforeach
                  @endif
          </div>
	      </section>

	      <section class="block-wrap">
          <h2>{{trans('messages.my_list')}}</h2>
          @if($my_lists->isEmpty())
            <div class="block-msg">
              <div>{{trans('messages.my_list_empty')}}</div> 
            </div>
          @else 
            <div class="list-horizontal-wrapper">
              @foreach($my_lists as $video)
                @include('r.chunks._video_item')
              @endforeach
            </div>
          @endif
	      </section>

	      <!-- <section class="block-wrap">
          <h2>{{trans('messages.liked_videos')}}</h2>  
          <div class="block-msg">
            <div>No liked videos yet</div>
            <p>Press <span class="icon icon-thumbs-up"></span> to like the video</p>
          </div>
	      </section> -->
	      
			<!-- </div> -->
    <!-- </div>  -->
  </div>
  @include('r.chunks._video_item_popup')
     
@endsection


@section('scripts')
     
	<!-- ADD TO LIST -->
	<!-- (same script on "single-video.blade.php") -->
  <script>
      @if(isset($grandVideo))
      function addToList() {

          var fd = new FormData;

          fd.append('_token', '{{csrf_token()}}');
          fd.append('id', '{{$grandVideo->id}}');


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
              	var curr_lang = $('body').data('active-lang')
              	if(curr_lang=='en'){
              		swal("Oh no!", "We couldn't add the movie to your list. Please try again later", "error");
              	}else{
              		swal("Oh non!", "Nous n'avons pas pu ajouter le film à votre liste. Veuillez réessayer plus tard", "error");
              	} 
              }
          });
      }
      @endif
  </script>
@endsection