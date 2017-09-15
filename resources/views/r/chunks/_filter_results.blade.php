<div class="video-list-block" style="border:1px solid lime;">

    @foreach($videos as $video)
      @include('r.chunks._video_item')
    @endforeach

</div>
