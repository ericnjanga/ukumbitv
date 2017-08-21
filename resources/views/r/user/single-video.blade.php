@extends('r.layouts.user-search')
@section('content')
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
                                <span class="date" style="border:3px solid red;">March 2017</span>
                                <span class="genre" style="border:3px solid green;">Drama, Comedy, Triller</span>
                                <div class="series-text">1 Season, 12 Series</div>
                            </div>
                            <div class="actors-block">
                                <div class="actors-title">Actors</div>
                                <p class="actors-list" style="border:3px solid yellow;">Scarlett Johansson, Beat Takeshi Kitano, Michael Carmen Pitt,
                                    Pilou Asbaek, Chin Han, Juliette Binoche</p>
                            </div>
                            <div class="butn-block">
                                <div class="play-block">
                                    <a href="" class="butn butn-orange-dark butn-play upper"><span
                                                class="icon icon-play-arrow"></span>Play</a>
                                    <a href="" class="butn butn-orange-dark upper">Add to list</a>
                                </div>
                                <div class="share-block">
                                    <a href="" class="butn-share"><span>f</span>Share</a>
                                    <a href="" class="butn-like"><span class="icon icon-thumbs-up"></span>158</a>
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
                                <span class="icon icon-thumbs-up"></span>
                                158
                            </div>
                            <div class="likes-item dislike">
                                <span class="icon icon-thumbs-down-hand"></span>
                                12
                            </div>
                            <div class="butn-block">
                                <a href="" class="butn butn-orange"><span class="icon icon-pencil-edit-button"></span>Write
                                    a review</a>
                            </div>
                        </div>
                        <div class="comment-block">
                            <div class="comment">
                                <div class="img-block">
                                    <!--<span class="icon icon-man-user"></span>-->
                                    <img src="{{asset('r/img/face.jpg')}}" alt="">
                                </div>
                                <div class="comment-text-block">
                                    <div class="comment-name">Alexandr Longname</div>
                                    <p class="comment-text">Sadly, as the plot proceeds, Sanders begins to duck ...
                                        bothersome concepts. He picks a more sentimental path, which leads Major,
                                        following the example of Jason Bourne, on a quest to discover who she truly
                                        is.</p>
                                </div>
                            </div>
                            <div class="comment">
                                <div class="img-block">
                                    <span class="icon icon-man-user icon-no-photo"></span>
                                </div>
                                <div class="comment-text-block">
                                    <div class="comment-name">Alexandr Longname</div>
                                    <p class="comment-text">Sadly, as the plot proceeds, Sanders begins to duck ...
                                        bothersome concepts. He picks a more sentimental path, which leads Major,
                                        following the example of Jason Bourne, on a quest to discover who she truly
                                        is.</p>
                                </div>
                            </div>
                            <div class="comment">
                                <div class="img-block">
                                    <!--<span class="icon icon-man-user"></span>-->
                                    <img src="{{asset('r/img/face.jpg')}}" alt="">
                                </div>
                                <div class="comment-text-block">
                                    <div class="comment-name">Alexandr Longname</div>
                                    <p class="comment-text">Sadly, as the plot proceeds, Sanders begins to duck ...
                                        bothersome concepts. He picks a more sentimental path, which leads Major,
                                        following the example of Jason Bourne, on a quest to discover who she truly
                                        is.</p>
                                </div>
                            </div>
                        </div>
                        <a href="" class="butn butn-orange-white butn-large">Load more</a>
                    </div>
                    <div class="form-block-wrap">
                        <div class="form-block">
                            <div class="title-form">Write your review</div>
                            <form action="" method="">
                                <div class="input-wrap textarea-wrap">
                                    <textarea name="" id=""></textarea>
                                </div>
                                <div class="comment-block">
                                	<div class="comment">
			                                <div class="img-block">
			                                    <img src="http://test.ukumbitv.com/r/img/face.jpg" alt="">
			                                </div>
			                                <div class="comment-text-block">
			                                    <div class="comment-name">Alexandr Longname</div> 
			                                </div>
			                            </div>
                                </div><!-- comment-block -->
                                  
                                <button type="submit" class="butn butn-orange butn-large">Submit</button>
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