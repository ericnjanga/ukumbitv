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
          	{{$video}}
              <!--
              {"id":2,"title":"Sample Video","description":"Sample Video","category_id":"1","sub_category_id":"1","genre_id":"0","video":"https:\/\/ukumbitv.com\/uploads\/videos\/original\/994420650bd0f400f90b365b3e2d25355779f677.mp4","trailer_video":"https:\/\/ukumbitv.com\/uploads\/videos\/original\/90be4aa8f7d92fce852d6377c33d3ae3880d5b20.mp4","default_image":"https:\/\/ukumbitv.com\/uploads\/images\/bcbe22984f787736e440b086828dda8024595d69.jpg","banner_image":"","ratings":"5","reviews":"Sample Video","status":"1","is_approved":"1","is_home_slider":"0","is_banner":"0","uploaded_by":"admin","publish_time":"2017-06-01 00:00:00","duration":"00:10:00","trailer_duration":"00:00:00","video_resolutions":"","trailer_video_resolutions":"","compress_status":"1","trailer_compress_status":"1","video_resize_path":null,"trailer_resize_path":null,"edited_by":"admin","watch_count":"1","type_of_user":"0","type_of_subscription":"0","amount":"0","created_at":"2017-06-01 14:01:57","updated_at":"2017-06-01 14:05:11","video_type":"1","video_upload_type":"2","actors":null,"directors":null,"watchid":"201707030106451"}
          -->
            <a href="{{url('/')}}/watch/{{$video->watchid}}" data-largesrc="{{$video->imgSmall1}}" data-title="{{$video->title}}" data-description="{{$video->description}}">
                <img class="og-tmb1" src="https://via.placeholder.com/250x170" alt="{{$video->title}}"/>
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
 
