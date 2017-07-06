@extends('layouts.user')

@section('styles')
<!--
 <link href="{{asset('assets/css/newvideo1.css')}}" rel="stylesheet">
  <script src="{{asset('assets/js/newvideo1.js')}}"></script>
-->
<style>
/*Removing "bitmovin" watermark logo from player*/
.bmpui-ui-watermark {
  display: none;
}

.btn-back {
	position: absolute;
	top: 40px;
	left: 40px;
	z-index: 9999999999;
}
</style>
@endsection



@section('headscripts')
	<script type="text/javascript" src="https://bitmovin-a.akamaihd.net/bitmovin-player/stable/7/bitmovinplayer.js"></script>
@endsection



@section('content')


<button id="btn-back" class="btn btn-back" style="display:none;">return</button>
<div id="player">{{$video->video}}</div>
<script type="text/javascript">
	//Setup here:
	//https://app.bitmovin.com/player/embed
  var conf = {
      key:       "bb175f20-6e3a-4edb-af12-619f8e67c88e",
       playback: {
		    autoplay                : true,
		    // muted                   : false
		  }, 
      source: { 
        progressive: "{{$video->video}}",
        poster:      "//bitmovin-a.akamaihd.net/content/MI201109210084_1/poster.jpg"
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





<div class="fb-share-button" data-href="https://ukumbitv.com/watch/{{$video->watchid}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fukumbitv.com%2Fwatch%2F{{$video->watchid}}&amp;src=sdkpreparse">Share</a></div>
  <div class="fb-comments" data-colorscheme="dark" data-href="https://ukumbitv.com/watch/{{$video->watchid}}" data-numposts="5"></div>
</div>  
@endsection



$('#btn-back').is(':hidden')


@section('scripts')
<script>
	var $btn_back = $('#btn-back'),
			t_hide_btn = 0;
	//...
	$('body').mousemove(function( event ) {
		console.log('move');

		clearTimeout(t_hide_btn);
		
		if($btn_back.is(':hidden')){
			$btn_back.fadeIn('slow');
		}
		
	  

	  var lastTimeMouseMoved = new Date().getTime();
		var t = setTimeout(function() {
		  var currentTime = new Date().getTime();
		  if (currentTime - lastTimeMouseMoved > 1000) {
		    // $('.fall').fadeOut('slow');
		    // $('.fall').remove();
		    t_hide_btn = setTimeout(function(){
		    	$btn_back.fadeOut('slow');
		    }, 2000);
		  }
		}, 1000)


	});
</script>
@endsection
