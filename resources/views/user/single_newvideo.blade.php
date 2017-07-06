@extends('layouts.user')

@section('styles')
<!--
 <link href="{{asset('assets/css/newvideo1.css')}}" rel="stylesheet">
  <script src="{{asset('assets/js/newvideo1.js')}}"></script>
-->
@endsection



@section('headscripts')
	<script type="text/javascript" src="https://bitmovin-a.akamaihd.net/bitmovin-player/stable/7/bitmovinplayer.js"></script>
@endsection



@section('content')

<div id="player">{{$video->video}}</div>
<script type="text/javascript">
    // var conf = {
    //     key:       "bb175f20-6e3a-4edb-af12-619f8e67c88e",
    //     autoplay : true,
    //     source: {
    //       dash:        "{{$video->video}}",
    //       hls:         "{{$video->video}}",
    //       progressive: "{{$video->video}}",
    //       poster:      "//bitmovin-a.akamaihd.net/content/MI201109210084_1/poster.jpg"
    //     }
    // };
    // var player = bitmovin.player("player");
    // player.setup(conf).then(function(value) {
    //     // Success
    //     console.log("Successfully created bitmovin player instance");
    // }, function(reason) {
    //     // Error!
    //     console.log("Error while creating bitmovin player instance");
    // });
</script>



<div class="fb-share-button" data-href="https://ukumbitv.com/watch/{{$video->watchid}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fukumbitv.com%2Fwatch%2F{{$video->watchid}}&amp;src=sdkpreparse">Share</a></div>
  <div class="fb-comments" data-colorscheme="dark" data-href="https://ukumbitv.com/watch/{{$video->watchid}}" data-numposts="5"></div>
</div>


<!-- 

<div class="">
  <video width="400" height="300" controls="controls" poster="{{$video->default_image}}">
      @if (Auth::guest())
      NO PLAY
      @else
          <source src="{{$video->video}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
          @endif

      Tag video not supported your browser.

  </video>
  <br>
   -->







<!--     <div class="y-content"> 
        <div class="row y-content-row">  
            <div class="page-inner col-sm-12 col-md-12 profile-edit"> 
                <div class="profile-content"> 
                    <div class="row"> 
                    </div>
                </div> 
            </div> 
        </div> 
    </div> -->

   

@endsection

@section('scripts')
<!--
    <script type="text/javascript">
        $(document).ready(function(){
            $('.video-y-menu').addClass('hidden');
        });
        function showReportForm() {
            var divId = document.getElementById('report_video_form').style.display;
            if (divId == 'none') {
                $('#report_video_form').show(500);
            } else {
                $('#report_video_form').hide(500);
            }
        }
    </script>

    <script src="{{asset('jwplayer/jwplayer.js')}}"></script>
    <script>jwplayer.key="{{envfile('JWPLAYER_KEY')}}";</script>
 

    <script type="text/javascript">

        jQuery(document).ready(function(){

                // Opera 8.0+
                var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
                // Firefox 1.0+
                var isFirefox = typeof InstallTrigger !== 'undefined';
                // At least Safari 3+: "[object HTMLElementConstructor]"
                var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
                // Internet Explorer 6-11
                var isIE = /*@cc_on!@*/false || !!document.documentMode;
                // Edge 20+
                var isEdge = !isIE && !!window.StyleMedia;
                // Chrome 1+
                var isChrome = !!window.chrome && !!window.chrome.webstore;
                // Blink engine detection
                var isBlink = (isChrome || isOpera) && !!window.CSS;

                @if($trailer_video)

                    if(isOpera || isSafari) {
                        jQuery('#trailer_video_setup_error').show();
                        jQuery('#main_video_setup_error').hide();
                        confirm('The video format is not supported in this browser. Please open with some other browser.');

                    } else {

                        var playerInstance = jwplayer("trailer-video-player");

                        @if($trailerstreamUrl)

                            playerInstance.setup({
                                file: "{{$trailerstreamUrl}}",
                                image: "{{$video->default_image}}",
                                width: "100%",
                                aspectratio: "16:9",
                                primary: "flash",
                            });
                        @else


                            var trailerVideoPath = "{{$trailer_video_path}}";
                            var trailerVideoPixels = "{{$trailer_pixels}}";

                            var trailerPath = [];

                            var splitTrailer = trailerVideoPath.split(',');

                            var splitTrailerPixel = trailerVideoPixels.split(',');


                            for (var i = 0 ; i < splitTrailer.length; i++) {

                                trailerPath.push({file : splitTrailer[i], label : splitTrailerPixel[i]});
                            }

                            // alert(trailerPath);
                            console.log(trailerPath);

                            playerInstance.setup({
                                sources: trailerPath,
                                image: "{{$video->default_image}}",
                                width: "100%",
                                aspectratio: "16:9",
                                primary: "flash",
                            });

                        @endif


                        playerInstance.on('setupError', function() {

                            jQuery("#trailer-video-player").css("display", "none");

                            jQuery('#main_video_setup_error').hide();

                            jQuery('#trailer_video_setup_error').css("display", "block");

                            confirm('The video format is not supported in this browser. Please open with some other browser.');

                        });

                        @if(!$history_status && Auth::check())

                            jwplayer().on('displayClick', function(e) {
                                jQuery.ajax({
                                    url: "{{route('user.add.history')}}",
                                    type: 'post',
                                    data: {'admin_video_id' : "{{$video->admin_video_id}}", 'video_status' : 0},
                                    success: function(data) {

                                       if(data.success == true) {

                                        console.log('Added to history');

                                       } else {
                                            console.log('Wrong...!');
                                       }
                                    }
                                });

                            });

                        @endif

                    }

                @endif

            //hang on event of form with id=myform
            jQuery("form[name='add_to_wishlist']").submit(function(e) {

                //prevent Default functionality
                e.preventDefault();

                //get the action-url of the form
                var actionurl = e.currentTarget.action;

                //do your own request an handle the results
                jQuery.ajax({
                        url: actionurl,
                        type: 'post',
                        dataType: 'json',
                        data: jQuery("#add_to_wishlist").serialize(),
                        success: function(data) {
                           if(data.success == true) {

                                jQuery("#added_wishlist").html("");

                                if(data.status == 1) {
                                    jQuery('#status').val("0");

                                    jQuery('#wishlist_id').val(data.wishlist_id);
                                    jQuery("#added_wishlist").css({'background':'rgb(229, 45, 39)','color' : '#FFFFFF'});
                                    jQuery("#added_wishlist").append('<i class="fa fa-heart"> {{tr('added_wishlist')}}');
                                } else {
                                    jQuery('#status').val("1");
                                    jQuery('#wishlist_id').val("");
                                    jQuery("#added_wishlist").css({'background':'','color' : ''});
                                    jQuery("#added_wishlist").append('<i class="fa fa-heart"> {{tr('add_to_wishlist')}}');
                                }
                           } else {
                                console.log('Wrong...!');
                           }
                        }
                });

            });

            $('#comment').keydown(function(event) {
                if (event.keyCode == 13) {
                    $(this.form).submit()
                    return false;
                 }
            }).focus(function(){
                if(this.value == "Write your comment here..."){
                     this.value = "";
                }

            }).blur(function(){
                if(this.value==""){
                     this.value = "";
                }
            });

            jQuery("form[name='comment_sent']").submit(function(e) {

                //prevent Default functionality
                e.preventDefault();

                //get the action-url of the form
                var actionurl = e.currentTarget.action;

                var form_data = jQuery("#comment").val();

                if(form_data) {

                    //do your own request an handle the results
                    jQuery.ajax({
                            url: actionurl,
                            type: 'post',
                            dataType: 'json',
                            data: jQuery("#comment_sent").serialize(),
                            success: function(data) {

                               if(data.success == true) {

                                @if(Auth::check())
                                    jQuery('#comment').val("");
                                    jQuery('#no_comment').hide();
                                    var comment_count = 0;
                                    var count = 0;
                                    comment_count = jQuery('#comment_count').text();
                                    var count = parseInt(comment_count) + 1;
                                    jQuery('#comment_count').text(count);
                                    jQuery('#video_comment_count').text(count);

                                    jQuery('#new-comment').prepend('<div class="display-com"><div class="com-image"><img style="width:48px;height:48px" src="{{Auth::user()->picture}}"></div><div class="display-comhead"><span class="sub-comhead"><a href="#"><h5 style="float:left">{{Auth::user()->name}}</h5></a><a href="#"><p>'+data.date+'</p></a><p class="com-para">'+data.comment.comment+'</p></span></div></div>');
                                @endif
                               } else {
                                    console.log('Wrong...!');
                               }
                            }
                    });
                } else {
                    return false;
                }

            });

            jQuery("form[name='watch_main_video']").submit(function(e) {

                //prevent Default functionality
                e.preventDefault();

                jQuery('#watch_main_video_button').fadeOut();

                    @if($main_video)

                        if(isOpera || isSafari) {

                            jQuery('#main_video_setup_error').show();
                            jQuery('#trailer_video_setup_error').hide();
                            jQuery('#main-video-player').hide();

                            confirm('The video format is not supported in this browser. Please option some other browser.');

                        } else {

                            var playerInstance = jwplayer("main-video-player");

                            @if($videoStreamUrl)

                            playerInstance.setup({
                                file: "{{$videoStreamUrl}}",
                                image: "{{$video->default_image}}",
                                width: "100%",
                                aspectratio: "16:9",
                                primary: "flash",
                                controls : true,
                                "controlbar.idlehide" : false,
                                controlBarMode:'floating',
                                "controls": {
                                    "enableFullscreen": false,
                                    "enablePlay": false,
                                    "enablePause": false,
                                    "enableMute": true,
                                    "enableVolume": true
                                },
                                // autostart : true,
                                "sharing": {
                                    "sites": ["reddit","facebook","twitter"]
                                  }

                            });
                            @else
                                var videoPath = "{{$videoPath}}";
                                var videoPixels = "{{$video_pixels}}";

                                var path = [];

                                var splitVideo = videoPath.split(',');

                                var splitVideoPixel = videoPixels.split(',');


                                for (var i = 0 ; i < splitVideo.length; i++) {

                                    path.push({file : splitVideo[i], label : splitVideoPixel[i]});
                                }

                                playerInstance.setup({
                                    sources: path,
                                    image: "{{$video->default_image}}",
                                    width: "100%",
                                    aspectratio: "16:9",
                                    primary: "flash",
                                    controls : true,
                                    "controlbar.idlehide" : false,
                                    controlBarMode:'floating',
                                    "controls": {
                                        "enableFullscreen": false,
                                        "enablePlay": false,
                                        "enablePause": false,
                                        "enableMute": true,
                                        "enableVolume": true
                                    },
                                    // autostart : true,
                                    "sharing": {
                                        "sites": ["reddit","facebook","twitter"]
                                      }

                                });

                            @endif

                            playerInstance.on('setupError', function() {

                                jQuery("#main-video-player").css("display", "none");
                                jQuery('#trailer_video_setup_error').hide();
                                jQuery('#main_video_setup_error').css("display", "block");

                                confirm('The video format is not supported in this browser. Please option some other browser.');

                            });
                        }

                    @else
                        jQuery('#main_video_error').show();
                        jQuery('#trailer_video_error').hide();
                    @endif

                    jQuery("#trailer-video-player").hide();
                    jQuery("#main-video-player").show();



                    // Remove trailer video url, to stop the autoplay while playing main video

                    //First get the  iframe URL
                    /*var url = $('#iframe_trailer_video').attr('src');

                    $('#iframe_trailer_video').attr('src', '');

                    jQuery("#trailer_video_play").hide();

                    jQuery("#main_video_play").show();*/




                    @if(!$history_status)

                        jQuery.ajax({
                            url: "{{route('user.add.history')}}",
                            type: 'post',
                            data: {'admin_video_id' : "{{$video->admin_video_id}}", 'video_status' : 1},
                            success: function(data) {

                               if(data.success == true) {

                                var watch_count = 0;
                                var count = 0;
                                watch_count = jQuery('#watch_count').text();
                                var count = parseInt(watch_count) + 1;
                                jQuery('#watch_count').text(count);

                                console.log('Added to history');

                               } else {
                                    console.log('Wrong...!');
                               }
                            }
                        });

                    @endif

            });

        });

    </script>
-->
@endsection
