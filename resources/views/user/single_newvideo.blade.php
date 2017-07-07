@extends('layouts.user')


@section('body-class')
page-singlevideo
@endsection 


@section('styles')
@endsection



@section('headscripts')
	<script type="text/javascript" src="https://bitmovin-a.akamaihd.net/bitmovin-player/stable/7/bitmovinplayer.js"></script>
@endsection



@section('content')
<div id="player"></div>
<script type="text/javascript">
	//INITIALIZE PLAYER:
	//-----------------
	//https://app.bitmovin.com/player/embed
  var conf = {
      key:       "bb175f20-6e3a-4edb-af12-619f8e67c88e",
       playback: {
		    autoplay                : true,
		    // muted                   : false
		  }, 
      source: { 
        progressive: "{{$video->video}}",
        poster:      "{{movie->imgBillboard}}"
      }
  };
  var player = bitmovin.player("player");
  player.setup(conf).then(function(value) {
      // Success
      console.log("Successfully created bitmovin player instance");
  }, function(reason) {
      // Error!
      console.log("Error while creating bitmovin player instance");
  });
</script>




<!-- Facebook comment and share -->
<div class="container">
	<a name="comment_or_share"></a>
	<div class="row">
		<!-- Facebook comment -->
		<div class="col-comment col-md-6">
			<div class="fb-comments" data-colorscheme="dark" data-href="https://ukumbitv.com/watch/{{$video->watchid}}" data-numposts="5"></div>
		</div>
		<!-- Facebook share -->
		<div class="col-share col-md-6">
			<div class="fb-share-button" data-href="https://ukumbitv.com/watch/{{$video->watchid}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fukumbitv.com%2Fwatch%2F{{$video->watchid}}&amp;src=sdkpreparse">Share</a></div>
		</div>
	</div>
</div>
@endsection



 



@section('scripts')
  <script src="{{asset('streamtube/js/app.single-video.js')}}"></script>
@endsection
