@extends('r.layouts.user-search')
@section('content')
    <div class="video-wrap">
        <div class="container">
            <div class="row">
                <iframe src="https://player.vimeo.com/video/{{$videoId}}?autoplay=1" autoplay="1" width="100%" height="700" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection