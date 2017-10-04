@extends('r.layouts.user-search')
@section('content')


        <section class="block-wrap">
            <h2>{{trans('messages.new_videos')}}</h2>
            <div class="list-horizontal-wrapper">
                @if(isset($recent_videos))
                    @foreach($recent_videos as $video)
                        @include('r.chunks._video_item')
                    @endforeach
                @endif
            </div>
        </section>

    @include('r.chunks._video_item_popup')

@endsection


@section('scripts')

@endsection