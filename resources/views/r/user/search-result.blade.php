@extends('r.layouts.user-search')
@section('content')
    <div class="search-main-wrap">
        <div class="container">
            <div class="clearfix">
                    @include('r.chunks._filter_video')
                
                <div class="global-main-content">
                    <div class="video-list-wrap">
                        <div class="title">
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
                        </div>
                        <div class="video-list-block-wrap">
                            <div class="js-filter-results">
                                @include('r.chunks._filter_results')
                            </div>
                            <a href="" class="butn btn-cta1 butn-large">Load more</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection