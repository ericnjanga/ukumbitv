@extends('r.layouts.user-search')
@section('content')
  <div class="page page-search">
    @include('r.chunks._filter_video')

    <div class="global-display"> 
      <div class="video-list-wrap">
          <!-- <div class="title">
              <div class="butn-menu">
                  <span></span>
                  <span></span>
                  <span></span>
              </div>
            <span>Search:</span> Transformers
          </div>
          <div class="filter-block-wrap">
              <div class="filter-block">
                  @include('r.chunks._sort_by')
              </div>
              <div class="filter-block">
                  @include('r.chunks._filter_tags')
              </div>
          </div> -->
          <h1>
          	{{trans('messages.your_search_results')}}
          </h1>
          <div class="video-list-block-wrap">
              <div class="js-filter-results">
                  @include('r.chunks._filter_results')
              </div>
              <!-- <a href="" class="butn btn-cta1 btn-lg">Load more</a> -->
          </div>
      </div><!-- video-list-wrap --> 
    </div><!-- global-display -->
  </div>
@endsection