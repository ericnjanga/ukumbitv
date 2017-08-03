@extends('layouts.user')


@section('body-class')
    page-homevideos
@endsection


@section('styles')
@endsection


@section('content')
    <div class="main-content video-content">
        @include('layouts.user.latest-uploads.hero-carousel')

        <div class="container video-container">
            <div class="row">
                <ul id="og-grid" class="og-grid video-content list-unstyled clearfix">
                    @foreach($videos as $indexKey => $video)
                        <li class="col">
                        <!--
              {{$video}}
                                {"id":14,"title":"edited title","description":"111111","category_id":"1","sub_category_id":"1","genre_id":"0","video":"https:\/\/ukumbitv.com\/movies\/20170707121053\/1499429453321.mp4","trailer_video":"trailer url","default_image":"https:\/\/ukumbitv.com\/images\/20170707121053\/billboard1499429453bil.png","banner_image":"","ratings":"5","reviews":"review","status":"1","is_approved":"1","is_home_slider":"0","is_banner":"0","uploaded_by":"admin","publish_time":"2017-06-05 10:45:00","duration":"11:11:11","trailer_duration":"00:00:00","video_resolutions":null,"trailer_video_resolutions":null,"compress_status":"0","trailer_compress_status":"0","video_resize_path":null,"trailer_resize_path":null,"edited_by":"admin","watch_count":"1","type_of_user":"0","type_of_subscription":"0","amount":"0","created_at":"2017-07-07 12:10:53","updated_at":"2017-07-08 10:42:00","video_type":"1","video_upload_type":"2","actors":"1,2","directors":"1,2","watchid":"20170707121053","lang_id":"1","year":"2015"}




-->
                            <a href="#" data-largesrc="{{$video->videoimage->imgPreview}}" data-title="{{$video->title}}" data-description="{{$video->description}}" data-theyear="{{$video->year}}" data-duration="{{$video->duration}}"  data-toggle="modal" data-target="#videoModal{{$indexKey}}">

                            <!--<img class="img-loading" src="{{asset('streamtube/images/loader.gif')}}"/>

src="http://via.placeholder.com/500x340"
	    				-->
                                <img class="og-tmb1 lazy" src="{{$video->videoimage->imgSmall1}}"  alt="{{$video->title}}"/>


                            </a>
                        </li>

                        <div class="modal fade video-modal" id="videoModal{{$indexKey}}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel{{$indexKey}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="videoModalLabel">Modal title</h4>
                                        <ul class="meta-list1 list-inline">
                                            <li id="videoModalYear"></li>
                                            <li id="videoModalCat">
                                                <span class="label label-info">Comedy</span>
                                            </li>
                                            <li id="videoModalDur"></li>
                                        </ul>
                                    </div>
                                    <div class="modal-body">
                                        <a href="{{url('/')}}/watch/{{$video->watchid}}"><img id="videoModalImg" src="https://via.placeholder.com/1000x600" alt="" class="img-responsive videoModalImg">
                                        </a>
                                        <div id="videoModalDesc" class="videoModalDesc"></div>
                                        <div id="videoMeta" class="videoMeta" style="padding:0 15px;">
                                            <div>

                                                <!-- Hide this if there is no actors -->
                                                <ul class="list-inline" style="margin-bottom: 3px;">
                                                    <li style="opacity: 0.6;">Starring: </li>
                                                    <li style="width: 80%;">
                                                        <!-- display actors here -->
                                                        <i>Actor name 1</i>, <i>Actor name 2</i>, <i>Actor name 3</i>
                                                        <!-- display actors here -->
                                                    </li>
                                                </ul>
                                                <!-- Hide this if there is no actors -->


                                                <!-- Hide this if there is no director -->
                                                <ul class="list-inline" style="margin-bottom: 3px;">
                                                    <li style="opacity: 0.6;">Director: </li>
                                                    <!-- display director here -->
                                                    <li style="width: 80%;"><i>Director</i></li>
                                                    <!-- display director here -->
                                                </ul>
                                                <!-- Hide this if there is no director -->


                                                <!-- Hide this if there is no tags -->
                                                <ul class="list-inline" style="margin-bottom: 3px;">
                                                    <li style="opacity: 0.6;">Genres: </li>
                                                    <li style="width: 80%;">
                                                        <!-- list tags here -->
                                                        @foreach(explode(',', $video->tags) as $tag)
                                                            <a href="/tag/{{$tag}}">{{$tag}}</a>
                                                            <!-- list tags here -->
                                                        @endforeach
                                                    </li>
                                                </ul>
                                                <!-- Hide this if there is no tags -->


                                                <!-- Hide this if there is no tags -->
                                                <ul class="list-inline" style="margin-bottom: 3px;">
                                                    <li style="opacity: 0.6;">Country: </li>
                                                    <li style="width: 80%;">
                                                        <!-- list tags here -->
                                                        <a href="#">... country ...</a>
                                                        <!-- list tags here -->
                                                    </li>
                                                </ul>
                                                <!-- Hide this if there is no tags -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                        <a href="{{url('/')}}/watch/{{$video->watchid}}" class="btn btn-primary col-xs-4 col-xs-offset-8">{{trans('messages.watch_video')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div><!-- main content -->






















@endsection

@section('scripts')

    <!--
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/blazy/1.8.2/blazy.min.js"></script>
 	<script src="{{asset('streamtube/js/grid.js')}}"></script>-->
    <script src="{{asset('streamtube/js/app.home-videos.js')}}"></script>

@endsection

