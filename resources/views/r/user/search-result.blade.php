@extends('r.layouts.user-search')
@section('content')
    <div class="search-main-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 menu-block">
                    @include('r.chunks._filter_video')
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10">
                    <div class="video-list-wrap">
                        <div class="title">
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
                            <a href="" class="butn butn-orange-white butn-large">Load more</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection