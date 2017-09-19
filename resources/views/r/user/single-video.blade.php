@extends('r.layouts.user-search')
@section('content')

  <div class="page-video-single">  
    <div class="global-display">
			@include('r.chunks._filter_video')

	    <div class="global-content utv-card">
	      <div class="hero">


	        <div class="info-block hero-sub">
	          <h1 class="title">{{$video->title}}</h1>
	          <div class="video-info-main">
	            <div class="info-left">
	            	<!-- <span class="age">16+</span> -->
	              <ul class="list-date-duration list-inline">
	              	<li>{{$video->created_at->format('Y')}}</li>
	              	<li>{{$duration}}</li>
	              </ul>
	              <div>
	              	{{$video->direct}}
	              </div>
	              <!-- <div class="cat">
	              	category
	              </div> -->
	              <div class="list-tags">
	                  {{$tags}}
	              </div>
	              <div class="cast-credits-title">
                	<b>Director: </b> {{$directors}} 
                </div> 
                <div class="cast-credits-text">
                  <b>Actors: </b> {{$actors}}
                </div>
	            </div><!-- info-left -->
	            <div class="info-right link-red-on">
	            	<div class="info-likes">
	            		<span class="icon icon-thumbs-up"></span>&nbsp;
	            		{{$likes}}
	                <span>&nbsp; Likes</span>
	              </div><!-- info-likes -->

								<button class="btn-link" onclick="addToList()">
									<i class="fa fa-bookmark" aria-hidden="true"></i>
									{{trans('messages.Add_to_list')}}
								</button>

	            </div><!-- info-right -->
	            <!-- <div class="series-text">1 Season, 12 Series</div> -->
	          </div><!-- video-info-main -->
	          <!-- <div class="actors-block">
	              <div class="actors-title">Actors</div>
	              <p class="actors-list" style="border:3px solid yellow;">Scarlett Johansson, Beat Takeshi Kitano, Michael Carmen Pitt,
	                  Pilou Asbaek, Chin Han, Juliette Binoche</p>
	          </div> -->
	        </div>
					

					<!-- <div style="background:lime;">
						{{$videoId}}
					</div> -->

	      	@if($checkTrial)
				@if($video->video_type == 'webseries')
					  <div id="player"></div>
					@else
	          <iframe class="iframe-video" src="https://player.vimeo.com/video/{{$videoId}}?autoplay=0" autoplay="0" width="100%" height="700" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	          @endif
					  <!-- <iframe class="iframe-video" src="https://player.vimeo.com/video/232604649?autoplay=0" autoplay="0" width="100%" height="700" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
	          <!-- <iframe src="https://player.vimeo.com/video/232604649" width="100%" height="500" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
	        @else
	          <div class="video-placeholder">
	          	<div class="video-item">
	          		<div class="video-img">
	          			<!-- {{$video->videoimage->imgPreview1}} -->
			          	@if($video->videoimage->imgPreview1!==null) 
										<img src="{{$video->videoimage->imgPreview1}}" alt="{{$video->title}}">
				          @else
										<img src="http://via.placeholder.com/510x800" alt="{{$video->title}}">
				          @endif 
	          		</div>
	          	</div> 
	          	<h2 class="video-placeholder--title">
	          		<span>{{trans('messages.msg_trial_ended')}}</span>
	          		<a href="{{route('user.package')}}" class="btn btn-block btn-cta1b">{{trans('messages.msg_upgrade')}}</a>
	          	</h2>
	        	</div> 
	        @endif
	      </div>







	      @if($video->video_type == 'episode')
	      <div class="block-wrap">
	        <div class="title">{{trans('messages.Episodes')}}</div>
	        <div class="series-list-block">
	            <ul class="series-list-slider">
	                <li><a href="">Series 1</a></li>
	                <li><a href="">Series 2</a></li>
	                <li><a href="">Series 3</a></li>
	                <li><a href="">Series 4</a></li>
	                <li><a href="">Series 5</a></li>
	                <li><a href="">Series 6</a></li>
	                <li><a href="">Series 7</a></li>
	                <li><a href="">Series 8</a></li>
	                <li><a href="">Series 9</a></li>
	                <li><a href="">Series 10</a></li>
	                <li><a href="">Series 11</a></li>
	                <li><a href="">Series 12</a></li>
	                <li><a href="">Series 13</a></li>
	                <li><a href="">Series 14</a></li>
	                <li><a href="">Series 15</a></li>
	            </ul>
	        </div>
	        <div class="list-horizontal-wrapper-wrap">
	            <div class="list-horizontal-wrapper">

	                @for ($group=1;$group<3;$group++)
	                    @for($i=1; $i<5; $i++)
	                        <div class="video-item video-item-dis">

	                            <div class="video-img">
	                                <img src="{{asset('r/img/video'.$i.'.png')}}" alt="">
	                            </div>
	                            <div class="video-title ellipsis-gradient">Transformers: Revenge of the
	                                Fallen
	                            </div>
	                            <div class="video-info">
	                                <div class="video-genre">Drama</div>
	                                <div class="butn-like"><span class="icon icon-thumbs-up"></span>
	                                    125
	                                </div>
	                                <div class="butn-dis"><span
	                                            class="icon icon-thumbs-down-hand"></span>19
	                                </div>
	                            </div>
	                        </div>
	                    @endfor
	                @endfor
	            </div>
	        </div>
	      </div>
	      @endif






	      <div class="hero-sub">
	        <p>{{$video->description}}</p>
	      </div>

<!-- 	      <hr>

	      <div class="hero-sub">
	          <h2>{{trans('messages.Cast_and_credits')}}</h2>
	          <div class="cast-credits-block">
	              <div class="cast-credits-item">
	                  <div class="cast-credits-title">Actors</div>
	                  
	              </div>
	              {{--<div class="cast-credits-item">--}}
	                  {{--<div class="cast-credits-title">Writers</div>--}}
	                  {{--<p class="cast-credits-text">Jamie Moss, William Wheeler, Ehren Kruger</p>--}}
	              {{--</div>--}}
	               
	              {{--<div class="cast-credits-item">--}}
	                  {{--<div class="cast-credits-title">Producers</div>--}}
	                  {{--<p class="cast-credits-text">Avi Arad, Ari Arad, Steven Paul, Michael Costigan,--}}
	                      {{--Jeffrey Silver, Tetsu Fujimura, Yoshinobu Noma,--}}
	                      {{--Mitsuhisa Ishikawa</p>--}}
	              {{--</div>--}}
	          </div>
	      </div> -->

	      <hr>

	      <div class="hero-sub">
	      	<div class="hero-sub_heading clearfix">
	      		<h2 class="title-reviews pull-left">{{trans('messages.reviews')}}</h2>
						
						@if($checkTrial)
	      		<button type="button" id="btn-comment-rate-modal" class="btn btn-default pull-right" data-toggle="modal" data-target="#comment-rate-modal">
	      			<span class="icon icon-pencil-edit-button"></span> &nbsp;
	      			{{trans('messages.Write_a_review')}}
	    			</button>
	      		@endif

	    			<a class="btn btn-primary pull-right fb-share-button ui facebook button">
	    				<i class="fa fa-facebook-official" aria-hidden="true"></i>
	    				{{trans('messages.share')}}</a> 
	      	</div>

	      	<div class="row rating-stats">
	      		<div class="col-xs-4">
	      			<span class="txt-xxl">
								<span id="likes-count">{{$likes}} </span>
	        			<span class="btn-like icon icon-thumbs-up {{($checkLike != null)?'btn-on':'btn-off'}}" data-route-like="{{route('like')}}" data-video-id="{{$video->id}}" data-route-unlike="{{route('unlike')}}"></span>
	            </span>
	      		</div>
	      		<div class="col-xs-4 text-center col-mid">
	      			<i class="fa fa-user" aria-hidden="true"></i> {{$likes + $dislikes}} total
	      		</div>
	      		<div class="col-xs-4">
	      			<span class="txt-xxl pull-right">
	      				<span id="dislikes-count">{{$dislikes}} </span>
	      				<span class="btn-dislike icon icon-thumbs-down-hand {{($checkDisLike != null)?'btn-on':'btn-off'}}" data-route-like="{{route('like')}}" data-video-id="{{$video->id}}" data-route-unlike="{{route('unlike')}}"></span>
	      			</span>
	      		</div>
	      	</div>
				</div><!-- hero-sub -->




				@if($checkTrial)
		      <hr> 
					<div class="hero-sub">
	          
	          <div class="comment-block" id="new-comment-section">
	          	<h2>Comments</h2>
	          	@foreach($video->comments as $comment)
	            <div class="comment">
	              <div class="img-block">
	                <!--<span class="icon icon-man-user"></span>-->
	                <img src="{{$comment->user->picture}}" alt="">
	              </div>
	              <div class="comment-text-block">
	                <div class="comment-name">@if($comment->user->name == '') {{$comment->user->email}} @else {{$comment->user->name}} @endif</div>
	                <p class="comment-text">
	                    {{$comment->text}}
	                </p>
	              </div>
	            </div>
	            @endforeach
	          </div>
	          
	          {{--<a href="" class="butn btn-cta1 btn-lg">Load more</a>--}}
		      </div>
	      @endif


	      <!-- comment and rating modal -->
	      <div class="modal fade" id="comment-rate-modal" class="modal-cr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

								<div class="media modal-cr__media">
								  <div class="media-left">
								    <img class="media-object" src="{{Auth::user()->picture}}" alt="..." width="48" height="48">
								  </div>
								  <div class="media-body">
								  	{{trans('messages.Review_by')}}
								    @if(Auth::user()->name != '')
	                      {{Auth::user()->name}}
	                      @else
	                      {{Auth::user()->email}}
	                  @endif
								  </div>
								</div> 
				      </div>
				      <div class="modal-body modal-cr__body">
				        	<!-- -->
				        <div class="media">
								  <div class="media-left">
								  	<img class="media-object" src="{{$video->videoimage->imgSmall1}}" alt="">
								  	<p>{{$video->title}}</p>
								  </div>
								  <div class="media-body">
								    <form>
	                    <div class="input-wrap textarea-wrap">
	                    	<textarea name="comment-text" id="comment-text" placeholder="Tell others what you think about the movie. Would you recommend it, and why?"></textarea>
	                    	<p class="rate-info">{{trans('messages.review_help')}}</p>
	                    </div>
	                  </form>
								  </div>
				        </div><!-- media -->



				      </div>
				      <div class="modal-footer modal-cr__footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('messages.close')}}</button>
				        <button id="btn-submit-comment" type="button" class="btn btn-submit" data-comment-route="{{route('send-comment')}}" data-video-id="{{$video->id}}">{{trans('messages.submit')}}</button>
				      </div>
				    </div>
				  </div>
				</div>
	      <!-- comment and rating modal -->
	    </div><!-- global-display -->

	    <aside class="block-aside" style="display:none;">
	        <div class="title">{{trans('messages.Similar_Videos')}}</div>

	            <div class="list-horizontal-wrapper-">
	                @if(count($relatedVideos) == 0)
	                    <h1>{{trans('messages.There_is_no_videos')}}</h1>
	                @else
	                @foreach($relatedVideos as $relatedVideo)

	                    <div class="video-item">
	                        <a href="{{route('user.singleVideo',$relatedVideo->watchid)}}">
	                            <div class="video-img">
	                                <img src="{{$relatedVideo->videoimage->imgSmall1}}" alt="">
	                            </div>
	                            <div class="video-title ellipsis-gradient">
	                              {{$relatedVideo->title}} ({{$video->created_at->format('Y')}})
	                            </div>
	                        </a>
	                        <div class="video-info">
	                            <div class="video-genre">{{$relatedVideo->category->name}}</div>
	                            <div class="butn-like"><span class="icon icon-thumbs-up"></span>
	                                {{count($relatedVideo->likes)}}
	                            </div>
	                        </div>
	                    </div>

	                @endforeach
	                    @endif
	            </div>
	    </aside><!-- block-aside --> 
    </div><!-- global-display -->
  </div><!-- page-single-video -->
@endsection

@section('scripts')
	<!-- ADD TO LIST -->
	<!-- (same script on "home-video.blade.php") -->

		<script>
			var episodes = '{{$episodesArr}}';
            vimeowrap('player').setup({
                urls: episodes.split(','),
                plugins: {
                    'playlist':{}
                }
            });
		</script>

  <script>
      // console.log('{{$checkTrial}}');
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
  <script src="https://player.vimeo.com/api/player.js"></script>
  <script>
      $(".ui.facebook.button").click(function() {
          FB.ui({
              method: 'share',
              href: "{{URL::to('/')}}/video/{{$video->watchid}}"
          }, function(response){});
      })
  </script>
  <script>
    var vimeo_iframe = $('iframe');
    var player = new Vimeo.Player(vimeo_iframe);
    var vimeo_flag = false;
//      debugger;\$checkTrial
    player.on('play', function() {
      console.log('played the video');
      if (vimeo_flag == true) return;
      player.pause().then(function() {
        $.ajax({
          type: 'POST',
          url: '/vimeo-video-play',
          data: {
            id: {{$video->watchid}},
            _token: '{{csrf_token()}}'
          },
          success: function(data){
            vimeo_flag = true;
            player.play();
          },
          error: function(data) {
            console.log('error');
          }
        })
      });
    })
  </script>
@endsection
