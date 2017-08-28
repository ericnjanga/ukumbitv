@extends('r.layouts.user-search')
@section('content')

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1900426896906624";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    
    <div class="container-fluid">
	    <div class="layout-3-columns">
    		@include('r.chunks._filter_video')
    		
        <div class="global-main-content utv-card">
          <div class="hero">
            <img src="{{asset("r/img/bg-video.png")}}" class="img-responsive" alt="">
            <div class="layer"></div>
            <div class="info-block">
              <h1 class="title">{{$video->title}}</h1>
              <div class="video-info-text">
                <span class="age">16+</span>
                <span class="date" style="border:3px solid red;">{{$video->created_at->format('Y')}}</span>
                <span class="genre" style="border:3px solid green;">
                    {{$tags}}
                </span>
                <div class="series-text">1 Season, 12 Series</div>
              </div>
              <!-- <div class="actors-block">
                  <div class="actors-title">Actors</div>
                  <p class="actors-list" style="border:3px solid yellow;">Scarlett Johansson, Beat Takeshi Kitano, Michael Carmen Pitt,
                      Pilou Asbaek, Chin Han, Juliette Binoche</p>
              </div> -->
              <div class="butn-block">
                <div class="play-block">
                  <a href="{{route('user.show-video', $video->watchid)}}" class="butn butn-orange-dark butn-play upper"><span class="icon icon-play-arrow"></span>{{trans('messages.Play')}}</a>
                  <a href="" class="butn butn-orange-dark upper">{{trans('messages.Add_to_list')}}</a>
                </div>
                <div class="share-block">
                  {{--<a href="" class="butn-share"><span>f</span>Share</a>--}}
                  <div class="fb-share-button" data-href="{{URL::to('/')}}/videos/{{$video->watchid}}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="{{URL::to('/')}}/videos/{{$video->watchid}}">{{trans('messages.share')}}</a></div>
 
                  @if($checkLike != null)
                    <a href="#" id="like-btn-top" class="butn-like" onclick="unlike()">
                      <span class="icon icon-thumbs-up"></span><span id="likes-count-top">{{$likes}}</span>
                    </a>
                  @else
                    <a href="#" id="like-btn-top" class="butn-like" onclick="like()">
                      <span class="icon icon-thumbs-up"></span><span id="likes-count-top">{{$likes}}</span>
                    </a>
                  @endif 
                </div>
              </div>
            </div>
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

          <hr>

          <div class="hero-sub">
              <h2>{{trans('messages.Cast_and_credits')}}</h2>
              <div class="cast-credits-block">
                  <div class="cast-credits-item">
                      <div class="cast-credits-title">Actors</div>
                      <p class="cast-credits-text">
                          {{$actors}}
                      </p>
                  </div>
                  {{--<div class="cast-credits-item">--}}
                      {{--<div class="cast-credits-title">Writers</div>--}}
                      {{--<p class="cast-credits-text">Jamie Moss, William Wheeler, Ehren Kruger</p>--}}
                  {{--</div>--}}
                  <div class="cast-credits-item">
                      <div class="cast-credits-title">Director</div>
                      <p class="cast-credits-text">
                          {{$directors}}
                      </p>
                  </div>
                  {{--<div class="cast-credits-item">--}}
                      {{--<div class="cast-credits-title">Producers</div>--}}
                      {{--<p class="cast-credits-text">Avi Arad, Ari Arad, Steven Paul, Michael Costigan,--}}
                          {{--Jeffrey Silver, Tetsu Fujimura, Yoshinobu Noma,--}}
                          {{--Mitsuhisa Ishikawa</p>--}}
                  {{--</div>--}}
              </div>
          </div>

          <hr>

          <div class="hero-sub">  
          	<div class="hero-sub_heading clearfix">
          		<h2 class="pull-left">{{trans('messages.reviews')}}</h2>
          		<button type="button" id="btn-comment-rate-modal" class="btn btn-default pull-right" data-toggle="modal" data-target="#comment-rate-modal"> 
          			<span class="icon icon-pencil-edit-button"></span> {{trans('messages.Write_a_review')}}</a></button>
          	</div>

          	<div class="row rating-stats">
          		<div class="col-sm-4">
          			<span class="txt-xxl">
									<span id="likes-count">{{$likes}} </span> 
	          			@if($checkLike != null)
	                  <span id="unlike" class="btn-like icon icon-thumbs-up btn-on"></span>
	                  <!-- <span id="unlike" class="icon icon-thumbs-up btn-on" onclick="unlike()"></span> -->
	                @else
	                  <span id="like" class="btn-like icon icon-thumbs-up btn-off"></span>
	                  <!-- <span id="like" class="icon icon-thumbs-up btn-off" onclick="like()"></span> -->
	                @endif
	              </span>
          		</div>
          		<div class="col-sm-4 text-center col-mid">
          			<span class="icon icon-thumbs-down-hand"></span> 1020 total
          		</div>
          		<div class="col-sm-4">
          			<span class="txt-xxl pull-right">
          				<span id="dislikes-count">{{$dislikes}} </span> 
          				@if($checkDisLike != null)
                    <span id="undislike" class="icon icon-thumbs-down-hand btn-on" onclick="undislike()"></span>
                  @else
                    <span id="dislike" class="icon icon-thumbs-down-hand btn-off" onclick="dislike()"></span>
                  @endif
          			</span>
          		</div> 
          	</div>



          
                 <!--      <ul class="rating-frame list-inline"> 
                      	<li>
                          @if($checkLike != null)
                            <span id="unlike" class="icon icon-thumbs-up" onclick="unlike()"></span>
                          @else
                            <span id="like" class="icon icon-thumbs-up" onclick="like()"></span>
                          @endif 
                      	</li> 
                      	<li>
                          @if($checkDisLike != null)
                            <span id="undislike" class="icon icon-thumbs-down-hand" onclick="undislike()"></span>
                          @else
                            <span id="dislike" class="icon icon-thumbs-down-hand" onclick="dislike()"></span>
                          @endif
                          <span id="dislikes-count">{{$dislikes}}</span> 
                      	</li> 
                    	</ul> -->
                       






              <div class="comment-block" id="new-comment-section">
              	@foreach($video->comments as $comment)
                <div class="comment">
                  <div class="img-block">
                    <!--<span class="icon icon-man-user"></span>-->
                    <img src="{{$comment->user->picture}}" alt="">
                  </div>
                  <div class="comment-text-block">
                    <div class="comment-name">{{$comment->user->name}}</div>
                    <p class="comment-text">
                        {{$comment->text}}
                    </p>
                  </div>
                </div>
                @endforeach 
              </div>
              {{--<a href="" class="butn butn-orange-white butn-large">Load more</a>--}}
          </div>
             

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
                        	<p class="rate-info">Most helpful reviews have 100 words or more</p>
                        </div> 
                      </form>  
									  </div>
					        </div><!-- media -->

                    
										 
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('messages.close')}}</button>
					        <button id="btn-submitcomment" type="button" class="btn btn-submit" data-comment-route="{{route('send-comment')}}">{{trans('messages.submit')}}</button>
					      </div>
					    </div>
					  </div>
					</div>
          <!-- comment and rating modal -->
        </div><!-- global-main-content -->

        <aside class="block-aside">
            <div class="title">{{trans('messages.Similar_Videos')}}</div>
             
                <div class="list-horizontal-wrapper">
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
	    </div><!-- block-3-columns -->
    </div> 
@endsection

@section('scripts')
  <script>
  	$('body').on('click','.btn-like', function(){
  		if(!$(this).hasClass('btn-on')){
  			like();
  		}else{
  			unlike();
  		}
  	});

    {{--$( document ).ready(function() {--}}
        {{--$('#like-btn-top').html('<span class="icon icon-thumbs-up"></span>{{$likes}}');--}}
    {{--});--}}
    

    function like(msg) { 
      var likesCount = $('#likes-count').text();
      var disLikesCount = $('#dislikes-count').text(); 
      var fd = new FormData;

      // console.log('>>>', msg);

      fd.append('_token', '{{csrf_token()}}');
      fd.append('id', '{{$video->id}}');
      fd.append('type', 'like');

      $.ajax({
	        type: 'POST',
	        url: '{{route('like')}}',
	        contentType: false,
	        processData: false,
	        data: fd,
	        dataType: 'html',
	        success: function(data){
	            // $('#like').attr({"onclick":"unlike()", "id":"unlike"});
	            // $('#like-btn-top').attr({"onclick":"unlike()"}); 
	            // $('#undislike').attr({"onclick":"dislike()", "id":"dislike"});

	//                    $('#unlike').css("color", "#fff");
	          $('#likes-count, #likes-count-top').text(+likesCount + 1);

	          var rep = JSON.parse(data);

	          if(rep.check === 1){
	              $('#dislikes-count').text(+disLikesCount - 1);
	          }
	          //console.log(rep);
	//                    swal("Cool!", "You have successfully liked!", "success");
        },
        error: function(data){
            swal("Hmm", "Something went wrong, try again pls", "error");
        }
      });
    }




        function unlike() {

            var likesCount = $('#likes-count').text();


            var fd = new FormData;

            fd.append('_token', '{{csrf_token()}}');
            fd.append('id', '{{$video->id}}');



            $.ajax({
                type: 'POST',
                url: '{{route('unlike')}}',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                success: function(data){
                    // $('#unlike').attr({"onclick":"like()", "id":"like"});
                    // $('#like-btn-top').attr({"onclick":"like()"});
//                    $('#like').css("color", "#333");
                    $('#likes-count, #likes-count-top').text(+likesCount - 1);
                    var rep = JSON.parse(data);
                    //console.log(rep);
//                    swal("Cool!", "You have successfully unliked!", "success");
                },
                error: function(data){
                    swal("Hmm", "Something went wrong, try again pls", "error");
                }
            });
        }





    function dislike() {

        var likesCount = $('#likes-count').text();
        var disLikesCount = $('#dislikes-count').text();

        var fd = new FormData;

        fd.append('_token', '{{csrf_token()}}');
        fd.append('id', '{{$video->id}}');
        fd.append('type', 'dislike');

        $.ajax({
            type: 'POST',
            url: '{{route('like')}}',
            contentType: false,
            processData: false,
            data: fd,
            dataType: 'html',
            success: function(data){
                // $('#dislike').attr({"onclick":"undislike()", "id":"undislike"});
                // $('#unlike').attr({"onclick":"like()", "id":"like"});
                // $('#like-btn-top').attr({"onclick":"like()"});
//                    $('#unlike').css("color", "#fff");
                $('#dislikes-count').text(+disLikesCount + 1);
                var rep = JSON.parse(data);
                if(rep.check === 1){
                    $('#likes-count, #likes-count-top').text(+likesCount - 1);
                }
                //console.log(rep);
//                    swal("Cool!", "You have successfully disliked!", "success");
            },
            error: function(data){
                swal("Hmm", "Something went wrong, try again pls", "error");
            }
        });
    }


        function undislike() {

            var disLikesCount = $('#dislikes-count').text();


            var fd = new FormData;

            fd.append('_token', '{{csrf_token()}}');
            fd.append('id', '{{$video->id}}');



            $.ajax({
                type: 'POST',
                url: '{{route('unlike')}}',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                success: function(data){
                    // $('#undislike').attr({"onclick":"dislike()", "id":"dislike"});
//                    $('#like').css("color", "#333");
                    $('#dislikes-count').text(+disLikesCount - 1);
                    var rep = JSON.parse(data);
                    //console.log(rep);
//                    swal("Cool!", "You have successfully unliked!", "success");
                },
                error: function(data){
                    swal("Hmm", "Something went wrong, try again pls", "error");
                }
            });
        }
    </script>
@endsection