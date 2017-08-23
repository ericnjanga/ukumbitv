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

    <div class="video-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    @include('r.chunks._filter_video')
                </div>
                <div class="col-sm-10">
                    <div class="main-top-block">
                        <img src="{{asset("r/img/bg-video.png")}}" alt="">
                        <div class="layer"></div>
                        <div class="video-info-block">
                            <div class="video-title">{{$video->title}}</div>
                            <div class="video-info-text">
                                <span class="age">16+</span>
                                <span class="date" style="border:3px solid red;">{{$video->created_at->format('d M Y')}}</span>
                                <span class="genre" style="border:3px solid green;">
                                    @foreach($tags as $tag)
                                        {{$tag}},
                                        @endforeach
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
                                    <a href="{{route('user.show-video', $video->watchid)}}" class="butn butn-orange-dark butn-play upper"><span
                                                class="icon icon-play-arrow"></span>Play</a>
                                    <a href="" class="butn butn-orange-dark upper">Add to list</a>
                                </div>
                                <div class="share-block">
                                    {{--<a href="" class="butn-share"><span>f</span>Share</a>--}}
                                    <div class="fb-share-button" data-href="{{URL::to('/')}}/videos/{{$video->watchid}}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="{{URL::to('/')}}/videos/{{$video->watchid}}">Share</a></div>
                                    {{--<a href="" class="butn-like"><span class="icon icon-thumbs-up"></span>158</a>--}}
                                    <div class="fb-like" data-href="{{URL::to('/')}}/videos/{{$video->watchid}}" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($video->video_type == 'episode')
                    <div class="video-slider-wrap">
                        <div class="title">Episodes</div>
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
                        <div class="video-slider-block-wrap">
                            <div class="video-slider-block">

                                @for ($group=1;$group<3;$group++)
                                    @for($i=1; $i<5; $i++)
                                        <div class="video-item-block">
                                            <div class="video-item video-item-dis">

                                                <div class="video-img">
                                                    <img src="{{asset('r/img/video'.$i.'.png')}}" alt="">
                                                </div>
                                                <div class="video-title ellipsis-gradient">Transformers: Revenge of the
                                                    Fallen
                                                </div>
                                                <div class="video-info">
                                                    <div class="video-genre">Drama</div>
                                                    <div class="butn-like"><span class="icon icon-thumbs-up"></span>125
                                                    </div>
                                                    <div class="butn-dis"><span
                                                                class="icon icon-thumbs-down-hand"></span>19
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @endfor
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="description-block">
                        <div class="title">Description</div>
                        <p class="description-text">{{$video->description}}</p>
                    </div>
                    <div class="cast-credits-wrap">
                        <div class="title">Cast and credits</div>
                        <div class="cast-credits-block">
                            <div class="cast-credits-item">
                                <div class="cast-credits-title">Actors</div>
                                <p class="cast-credits-text">
                                    @foreach($actors as $actor)
                                        {{$actor}}, 
                                        @endforeach
                                </p>
                            </div>
                            {{--<div class="cast-credits-item">--}}
                                {{--<div class="cast-credits-title">Writers</div>--}}
                                {{--<p class="cast-credits-text">Jamie Moss, William Wheeler, Ehren Kruger</p>--}}
                            {{--</div>--}}
                            <div class="cast-credits-item">
                                <div class="cast-credits-title">Director</div>
                                <p class="cast-credits-text">
                                    @foreach($directors as $director)
                                      {{$director}}
                                    @endforeach
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
                    <div class="reviews-block">
                        <div class="title">Reviews</div>
                        <div class="likes-block">
                            <div class="likes-item like">
                                @if($checkLike != null)
                                    <span id="unlike" class="icon icon-thumbs-up" onclick="unlike()"></span>
                                        @else
                                    <span id="like" class="icon icon-thumbs-up" onclick="like()"></span>
                                                @endif
                                <span id="likes-count">{{$likes}}</span>
                            </div>
                            <div class="likes-item dislike">
                                @if($checkDisLike != null)
                                    <span id="undislike" class="icon icon-thumbs-down-hand" onclick="undislike()"></span>
                                @else
                                    <span id="dislike" class="icon icon-thumbs-down-hand" onclick="dislike()"></span>
                                @endif
                                <span id="dislikes-count">{{$dislikes}}</span>
                            </div>
                            <div class="butn-block">
                                <a href="" class="butn butn-orange"><span class="icon icon-pencil-edit-button"></span>Write
                                    a review</a>
                            </div>
                        </div>
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
                    <div class="form-block-wrap">
                        <div class="form-block">
                            <div class="title-form">Write your review</div>
                            <form>
                                <div class="input-wrap textarea-wrap">
                                    <textarea name="comment-text" id="comment-text"></textarea>
                                </div>
                                <div class="comment-block" style="margin:0;">
                                	<div class="comment" style="margin:0;">
			                                <div class="img-block">
			                                    <img src="{{Auth::user()->picture}}" alt="">
			                                </div>
			                                <div class="comment-text-block">
			                                    <div class="comment-name">{{Auth::user()->name}}</div>
			                                </div>
                                    </div>
                                </div><!-- comment-block -->
                            <button class="butn butn-orange butn-large" onclick="sendComment()">Submit</button>
                                  

                            </form>
                        </div>
                    </div>
                    <div class="video-slider-wrap">
                        <div class="title">Similar Videos</div>
                        <div class="video-slider-block-wrap">
                            <div class="video-slider-block">
                                @for($g=1;$g<3;$g++)
                                    @for($i=1;$i<6;$i++)
                                        <div class="video-item-block">
                                            <div class="video-item">
                                                <a href="{{route('single-video',0)}}">
                                                    <div class="video-img">
                                                        <img src="{{asset("r/img/video".$i.".png")}}" alt="">
                                                    </div>
                                                    <div class="video-title ellipsis-gradient">Transformers: Revenge of
                                                        the
                                                        Fallen
                                                    </div>
                                                </a>
                                                <div class="video-info">
                                                    <div class="video-genre">Drama</div>
                                                    <div class="butn-like"><span class="icon icon-thumbs-up"></span>25
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function sendComment() {

            var token = $('meta[name="csrf-token"]').attr('content');
            var fd = new FormData;

            fd.append('_token', token);
            fd.append('video_id', '{{$video->id}}');
            fd.append('text', $('#comment-text').val());

            $.ajax({
                type: 'POST',
                url: '{{route('send-comment')}}',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    //alert('Comment successful send!');
                    //console.log(rep);

                    $("#new-comment-section").append('<div class="comment"><div class="img-block"><img src="{{Auth::user()->picture}}" alt=""></div><div class="comment-text-block"><div class="comment-name">{{Auth::user()->name}}</div><p class="comment-text">'+rep.text+'</p></div></div>');
                },
                error: function (data) {
                    alert('error '+data);
                }
            });

        }

        function like() {

            var likesCount = $('#likes-count').text();
            var disLikesCount = $('#dislikes-count').text();

            var fd = new FormData;

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
                    $('#like').attr({"onclick":"unlike()", "id":"unlike"});
                    $('#undislike').attr({"onclick":"dislike()", "id":"dislike"});

//                    $('#unlike').css("color", "#fff");
                    $('#likes-count').text(+likesCount + 1);

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
                    $('#dislike').attr({"onclick":"undislike()", "id":"undislike"});
                    $('#unlike').attr({"onclick":"like()", "id":"like"});
//                    $('#unlike').css("color", "#fff");
                    $('#dislikes-count').text(+disLikesCount + 1);
                    var rep = JSON.parse(data);
                    if(rep.check === 1){
                        $('#likes-count').text(+likesCount - 1);
                    }
                    //console.log(rep);
//                    swal("Cool!", "You have successfully disliked!", "success");
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
                    $('#unlike').attr({"onclick":"like()", "id":"like"});
//                    $('#like').css("color", "#333");
                    $('#likes-count').text(+likesCount - 1);
                    var rep = JSON.parse(data);
                    //console.log(rep);
//                    swal("Cool!", "You have successfully unliked!", "success");
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
                    $('#undislike').attr({"onclick":"dislike()", "id":"dislike"});
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