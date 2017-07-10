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
        @foreach($videos as $video)
          <li class="col">

              <!--
              {{$video}}
          	{"id":14,"title":"edited title","description":"111111","category_id":"1","sub_category_id":"1","genre_id":"0","video":"https:\/\/ukumbitv.com\/movies\/20170707121053\/1499429453321.mp4","trailer_video":"trailer url","default_image":"https:\/\/ukumbitv.com\/images\/20170707121053\/billboard1499429453bil.png","banner_image":"","ratings":"5","reviews":"review","status":"1","is_approved":"1","is_home_slider":"0","is_banner":"0","uploaded_by":"admin","publish_time":"2017-06-05 10:45:00","duration":"11:11:11","trailer_duration":"00:00:00","video_resolutions":null,"trailer_video_resolutions":null,"compress_status":"0","trailer_compress_status":"0","video_resize_path":null,"trailer_resize_path":null,"edited_by":"admin","watch_count":"1","type_of_user":"0","type_of_subscription":"0","amount":"0","created_at":"2017-07-07 12:10:53","updated_at":"2017-07-08 10:42:00","video_type":"1","video_upload_type":"2","actors":"1,2","directors":"1,2","watchid":"20170707121053","lang_id":"1","year":"2015"}
              
          -->
            <a href="{{url('/')}}/watch/{{$video->watchid}}" data-largesrc="{{$video->videoimage->imgPreview}}" data-title="{{$video->title}}" data-description="{{$video->description}}" data-year="{{$video->year}}">
                <img class="og-tmb1" src="{{$video->videoimage->imgSmall1}}" alt="{{$video->title}}"/>
            </a> 
          </li>
        @endforeach 
      </ul>
    </div>
  </div>

<!--
@yield('content')
      -->
</div>
@endsection

@section('scripts')
 	<script src="{{asset('streamtube/js/grid.js')}}"></script>
  <script src="{{asset('streamtube/js/app.home-videos.js')}}"></script>
@endsection
 
