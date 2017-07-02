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

    	<div class="container">
    		
			<div class="main">
				<ul id="og-grid" class="og-grid">
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="https://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
				</ul>
				<p>Filler text by <a href="http://veggieipsum.com/">Veggie Ipsum</a></p>
				<a id="og-additems" href="#">add more</a>
			</div>
    	</div>







			<div class="container video-container">
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
								</div><!-- panel-group --> 
				      </div><!-- caption -->
				    </div>
				  </div> 
				  {{--video-thumbnail--}}
					
		    	<div class="col col-xs-6 col-md-3">
				    <div class="thumbnail video-thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">  
								<div class="panel-group thumbnail-info2 video-thumbnail-accordion" id="accordion2a" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="heading2a">

							        <h3 class="thumbnail-title">[Title]</h3>
							        <div class="thumbnail-info1">
							        	<time class="ib">[year]</time>, <div class="ib">[Country]</div>
							        </div>

											
							        <a role="button" class="sr-only" data-toggle="collapse" data-parent="#accordion2a" href="#collapse2a" aria-expanded="true" aria-controls="collapse2a">
							          {{trans('more_info')}}
							        </a> 
								    </div>
								    <div id="collapse2a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2a">
								      <div class="panel-body">
								        Danish sweet roll candy canes dragée tart powder gummi bears. Chocolate pastry cookie lollipop liquorice. Cheesecake gingerbread gingerbread pastry jujubes powder caramels.
								      </div>
								    </div>
								  </div> 
								</div><!-- panel-group --> 
				      </div><!-- caption -->
				    </div>
				  </div> 
				  {{--video-thumbnail--}}


		    	<div class="col col-xs-6 col-md-3">
				    <div class="thumbnail video-thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">  
								<div class="panel-group thumbnail-info2 video-thumbnail-accordion" id="accordion3a" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="heading3a">

							        <h3 class="thumbnail-title">[Title]</h3>
							        <div class="thumbnail-info1">
							        	<time class="ib">[year]</time>, <div class="ib">[Country]</div>
							        </div>

											
							        <a role="button" class="sr-only" data-toggle="collapse" data-parent="#accordion3a" href="#collapse3a" aria-expanded="true" aria-controls="collapse3a">
							          {{trans('more_info')}}
							        </a> 
								    </div>
								    <div id="collapse3a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3a">
								      <div class="panel-body">
								        Danish sweet roll candy canes dragée tart powder gummi bears. Chocolate pastry cookie lollipop liquorice. Cheesecake gingerbread gingerbread pastry jujubes powder caramels.
								      </div>
								    </div>
								  </div> 
								</div><!-- panel-group --> 
				      </div><!-- caption -->
				    </div>
				  </div> 
				  {{--video-thumbnail--}}


		    	<div class="col col-xs-6 col-md-3">
				    <div class="thumbnail video-thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">  
								<div class="panel-group thumbnail-info2 video-thumbnail-accordion" id="accordion4a" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="heading4a">

							        <h3 class="thumbnail-title">[Title]</h3>
							        <div class="thumbnail-info1">
							        	<time class="ib">[year]</time>, <div class="ib">[Country]</div>
							        </div>

											
							        <a role="button" class="sr-only" data-toggle="collapse" data-parent="#accordion4a" href="#collapse4a" aria-expanded="true" aria-controls="collapse4a">
							          {{trans('more_info')}}
							        </a> 
								    </div>
								    <div id="collapse4a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4a">
								      <div class="panel-body">
								        Danish sweet roll candy canes dragée tart powder gummi bears. Chocolate pastry cookie lollipop liquorice. Cheesecake gingerbread gingerbread pastry jujubes powder caramels.
								      </div>
								    </div>
								  </div> 
								</div><!-- panel-group --> 
				      </div><!-- caption -->
				    </div>
				  </div> 
				  {{--video-thumbnail--}}


		    	<div class="col col-xs-6 col-md-3">
				    <div class="thumbnail video-thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">  
								<div class="panel-group thumbnail-info2 video-thumbnail-accordion" id="accordion5a" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="heading5a">

							        <h3 class="thumbnail-title">[Title]</h3>
							        <div class="thumbnail-info1">
							        	<time class="ib">[year]</time>, <div class="ib">[Country]</div>
							        </div>

											
							        <a role="button" class="sr-only" data-toggle="collapse" data-parent="#accordion5a" href="#collapse5a" aria-expanded="true" aria-controls="collapse5a">
							          {{trans('more_info')}}
							        </a> 
								    </div>
								    <div id="collapse5a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5a">
								      <div class="panel-body">
								        Danish sweet roll candy canes dragée tart powder gummi bears. Chocolate pastry cookie lollipop liquorice. Cheesecake gingerbread gingerbread pastry jujubes powder caramels.
								      </div>
								    </div>
								  </div> 
								</div><!-- panel-group --> 
				      </div><!-- caption -->
				    </div>
				  </div> 
				  {{--video-thumbnail--}}


		    	<div class="col col-xs-6 col-md-3">
				    <div class="thumbnail video-thumbnail">
				    	<i class="fa fa-play-circle" aria-hidden="true"></i>
				      <img src="http://via.placeholder.com/500x420" class="img-responsive" alt="...">
				      <div class="caption">  
								<div class="panel-group thumbnail-info2 video-thumbnail-accordion" id="accordion6a" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="heading6a">

							        <h3 class="thumbnail-title">[Title]</h3>
							        <div class="thumbnail-info1">
							        	<time class="ib">[year]</time>, <div class="ib">[Country]</div>
							        </div>

											
							        <a role="button" class="sr-only" data-toggle="collapse" data-parent="#accordion6a" href="#collapse6a" aria-expanded="true" aria-controls="collapse6a">
							          {{trans('more_info')}}
							        </a> 
								    </div>
								    <div id="collapse6a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6a">
								      <div class="panel-body">
								        Danish sweet roll candy canes dragée tart powder gummi bears. Chocolate pastry cookie lollipop liquorice. Cheesecake gingerbread gingerbread pastry jujubes powder caramels.
								      </div>
								    </div>
								  </div> 
								</div><!-- panel-group --> 
				      </div><!-- caption -->
				    </div>
				  </div> 
				  {{--video-thumbnail--}}
				</div><!--row-->
			</div><!--container-->
			


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