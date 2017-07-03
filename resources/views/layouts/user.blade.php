<!DOCTYPE html>
<html class="no-js">
	<head>
	    <title>{{trans('messages.site_name')}} - {{trans('messages.website_description')}}</title>
	    


	    <meta name="viewport" content="width=device-width,  initial-scale=1">
	    <link rel="stylesheet" href="{{asset('streamtube/css/bootstrap.min.css')}}"> 
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/app.css')}}"> 
	    <link rel="shortcut icon" type="image/png" href="{{asset('streamtube/images/logo2-fav.png')}}"/>
	    <script src="{{asset('streamtube/js/vendors/modernizr-custom.js')}}"></script>
	    <!--  
	    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/style.css')}}">
	    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/responsive.css')}}"> --> 
	    @yield('styles') 
	</head>

	<body class="page-videos"> 
    @include('layouts.user.header')

    <div class="main-content video-content">
    	@include('layouts.user.latest-uploads.hero-carousel')

    	<div class="container video-container"> 
				<div class="row">
					<ul id="og-grid" class="og-grid video-content list-unstyled clearfix">
						<li class="col">
							<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
								<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
							</a>
						</li>
						<li class="col">
							<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
								<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
							</a>
						</li>
						<li class="col">
							<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
								<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
							</a>
						</li>
						<li class="col">
							<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
								<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
							</a>
						</li>
						<li class="col">
							<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
								<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
							</a>
						</li>
						<li class="col">
							<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
								<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
							</a>
						</li>
						<li class="col">
							<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
								<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
							</a>
						</li>
						<li class="col">
							<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
								<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
							</a>
						</li>
					</ul> 
				</div>
    	</div>







			<!-- <div class="container video-container">
				<div class="row">
		    	<div class="col col-xs-6 col-md-3">
				    <div class="thumbnail video-thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">  
								<div class="panel-group thumbnail-info2 video-thumbnail-accordion" id="accordion1a" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="heading1a">

							        <h3 class="thumbnail-title">[Title]</h3>
							        <div class="thumbnail-info1">
							        	<time class="ib">[year]</time>, <div class="ib">[Country]</div>
							        </div>

											
							        <a role="button" class="sr-only" data-toggle="collapse" data-parent="#accordion1a" href="#collapse1a" aria-expanded="true" aria-controls="collapse1a">
							          {{trans('more_info')}}
							        </a> 
								    </div>
								    <div id="collapse1a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1a">
								      <div class="panel-body">
								        Danish sweet roll candy canes dragée tart powder gummi bears. Chocolate pastry cookie lollipop liquorice. Cheesecake gingerbread gingerbread pastry jujubes powder caramels.
								      </div>
								    </div>
								  </div> 
								</div>  
				      </div> 
				    </div>
				  </div> 
				  {{--video-thumbnail--}}
				 
 
				</div> 
			</div>  -->
			


    	<!-- 
      @yield('content') 
    	-->
    </div>

    @include('layouts.user.footer')
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
 		
 		<!--<script src="{{asset('streamtube/_resources/js/grid.js')}}"></script>-->
 		<script src="{{asset('streamtube/js/grid.js')}}"></script>
 		<script src="{{asset('streamtube/js/app.videos-landing.js')}}"></script>

		<!--<script>
			$(function() {
				Grid.init();
			});
		</script>-->
  	<!-- Video Page script -->
	  <!--<script src="{{asset('streamtube/js/app.videos-landing.js')}}"></script>-->
    @yield('scripts') 
	</body>
</html>