@extends('r.layouts.user-search')
@section('content')
  <div class="page page-categories page-{{$videoType}}"> 
    <div class="global-display"> 
    	@include('r.chunks._filter_video')

    	<div class="global-content">
	      <div class="video-list-wrap"> 
          <!-- for step 2 -->
          <!-- for step 2 -->
          <!-- 
          <div class="title">All Videos</div>
          	<div class="filter-block-wrap">
            <div class="filter-block">
              @include('r.chunks._sort_by')
            </div>
            <div class="filter-block">
              @include('r.chunks._filter_tags')
            </div>
          </div> -->
           
          <div class="block-wrap">
            @foreach($videos as $video)
            	@include('r.chunks._video_item') 
            @endforeach
          </div>
            <!-- <a href="" class="butn btn-cta1 btn-lg">Load more</a> --> 
	      </div><!-- video-list-wrap -->
	    </div><!-- global-content -->
    </div><!-- global-display -->
  </div>
@endsection