<!-- email confirmation reminder -->
@if(Auth::check())
@if(!Auth::user()->isVerified())
	<div class="alert__force-notice alert alert-info text-center" role="alert">
		{{trans('messages.auth_confirm_reminder1')}}
		<a href="{{route('user.confirm-user-email')}}"><b>{{trans('messages.auth_confirm_reminder2')}}</b></a> <i class="fa fa-smile-o" aria-hidden="true"></i>
	</div>
@endif
@endif
<!-- email confirmation reminder -->




<header class="ukb-main-header">
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">{{trans('messages.toggle_navigation')}}</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="ukb-navbar-brand navbar-brand" href="/"><img src="{{asset('r/img/logo.png')}}" alt="UkumbiTV" title="UkumbiTV" style="max-width:170px;"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
	    	<ul class="ukb-nav-videos nav navbar-nav">
	        <li id="movies">
						<a href="#"> 
							{{trans('messages.dramas')}}
						</a> 
					</li>
					<li id="animations">
						<a href="#"> 
							{{trans('messages.comedies')}}
						</a> 
					</li>  
	      </ul>






	    	<!-- <ul class="ukb-nav-videos nav navbar-nav">
	        <li id="movies">
						<a href="{{route('user.videotype', 'movies')}}"> 
							{{trans('messages.movies')}}
						</a> 
					</li>
					<li id="animations">
						<a href="{{route('user.videotype', 'animations')}}"> 
							{{trans('messages.animations')}}
						</a> 
					</li>  
	      </ul> -->




				

	      <!-- <div id="frame-search" class="frame-search">
			  
	        <form action="{{route('search-all')}}" class="navbar-form navbar-left" method="post">  
	          <div class="input-group">
				      <input name="key" type="text" id="search-input" class="form-control search-input typeahead" placeholder="{{trans('messages.Search_placeholder')}}" autocomplete="false">
				      <span class="input-group-btn">
				        <button class="btn btn-search btn-primary" type="submit"> 
				      		<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				      		<span class="sr-only">{{trans('messages.search')}}!</span>
				      	</button>
				      </span>
				    </div>
	        </form> 
	      </div> -->

	      <ul class="nav navbar-nav navbar-right"> 
	        <li class="dropdown"> 
	          @include('r.chunks._login_block') 
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</header>








			<div id="morphsearch" class="morphsearch">
				<form class="morphsearch-form">
					<input class="morphsearch-input" type="search" placeholder="Search..."/>
					<button class="morphsearch-submit" type="submit">Search</button>
				</form>
				<div class="morphsearch-content">
					<div class="dummy-column">
						<h2>People</h2>
						<a class="dummy-media-object" href="http://twitter.com/SaraSoueidan">
							<img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan"/>
							<h3>Sara Soueidan</h3>
						</a>
						<a class="dummy-media-object" href="http://twitter.com/rachsmithtweets">
							<img class="round" src="http://0.gravatar.com/avatar/48959f453dffdb6236f4b33eb8e9f4b7?s=50&d=identicon&r=G" alt="Rachel Smith"/>
							<h3>Rachel Smith</h3>
						</a>
						<a class="dummy-media-object" href="http://www.twitter.com/peterfinlan">
							<img class="round" src="http://0.gravatar.com/avatar/06458359cb9e370d7c15bf6329e5facb?s=50&d=identicon&r=G" alt="Peter Finlan"/>
							<h3>Peter Finlan</h3>
						</a>
						<a class="dummy-media-object" href="http://www.twitter.com/pcridesagain">
							<img class="round" src="http://1.gravatar.com/avatar/db7700c89ae12f7d98827642b30c879f?s=50&d=identicon&r=G" alt="Patrick Cox"/>
							<h3>Patrick Cox</h3>
						</a>
						<a class="dummy-media-object" href="https://twitter.com/twholman">
							<img class="round" src="http://0.gravatar.com/avatar/cb947f0ebdde8d0f973741b366a51ed6?s=50&d=identicon&r=G" alt="Tim Holman"/>
							<h3>Tim Holman</h3>
						</a>
						<a class="dummy-media-object" href="https://twitter.com/shaund0na">
							<img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G" alt="Shaun Dona"/>
							<h3>Shaun Dona</h3>
						</a>
					</div>
					<div class="dummy-column">
						<h2>Popular</h2>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/08/05/page-preloading-effect/">
							<img src="img/thumbs/PagePreloadingEffect.png" alt="PagePreloadingEffect"/>
							<h3>Page Preloading Effect</h3>
						</a>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/05/28/arrow-navigation-styles/">
							<img src="img/thumbs/ArrowNavigationStyles.png" alt="ArrowNavigationStyles"/>
							<h3>Arrow Navigation Styles</h3>
						</a>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/06/19/ideas-for-subtle-hover-effects/">
							<img src="img/thumbs/HoverEffectsIdeasNew.png" alt="HoverEffectsIdeasNew"/>
							<h3>Ideas for Subtle Hover Effects</h3>
						</a>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/07/14/freebie-halcyon-days-one-page-website-template/">
							<img src="img/thumbs/FreebieHalcyonDays.png" alt="FreebieHalcyonDays"/>
							<h3>Halcyon Days Template</h3>
						</a>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/05/22/inspiration-for-article-intro-effects/">
							<img src="img/thumbs/ArticleIntroEffects.png" alt="ArticleIntroEffects"/>
							<h3>Inspiration for Article Intro Effects</h3>
						</a>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/06/26/draggable-dual-view-slideshow/">
							<img src="img/thumbs/DraggableDualViewSlideshow.png" alt="DraggableDualViewSlideshow"/>
							<h3>Draggable Dual-View Slideshow</h3>
						</a>
					</div>
					<div class="dummy-column">
						<h2>Recent</h2>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/10/07/tooltip-styles-inspiration/">
							<img src="img/thumbs/TooltipStylesInspiration.png" alt="TooltipStylesInspiration"/>
							<h3>Tooltip Styles Inspiration</h3>
						</a>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/09/23/animated-background-headers/">
							<img src="img/thumbs/AnimatedHeaderBackgrounds.png" alt="AnimatedHeaderBackgrounds"/>
							<h3>Animated Background Headers</h3>
						</a>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/09/16/off-canvas-menu-effects/">
							<img src="img/thumbs/OffCanvas.png" alt="OffCanvas"/>
							<h3>Off-Canvas Menu Effects</h3>
						</a>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/09/02/tab-styles-inspiration/">
							<img src="img/thumbs/TabStyles.png" alt="TabStyles"/>
							<h3>Tab Styles Inspiration</h3>
						</a>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/08/19/making-svgs-responsive-with-css/">
							<img src="img/thumbs/ResponsiveSVGs.png" alt="ResponsiveSVGs"/>
							<h3>Make SVGs Responsive with CSS</h3>
						</a>
						<a class="dummy-media-object" href="http://tympanus.net/codrops/2014/07/23/notification-styles-inspiration/">
							<img src="img/thumbs/NotificationStyles.png" alt="NotificationStyles"/>
							<h3>Notification Styles Inspiration</h3>
						</a>
					</div>
				</div><!-- /morphsearch-content -->
				<span class="morphsearch-close"></span>
			</div><!-- /morphsearch -->
			 
			<div class="ukumbitv-overlay"></div>