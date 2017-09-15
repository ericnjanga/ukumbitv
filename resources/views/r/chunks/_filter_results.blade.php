<div class="video-list-block" style="border:10px solid green;">

    @foreach($videos as $video)
      @include('r.chunks._video_item')
    @endforeach

</div>
