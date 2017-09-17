<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>UkumbiTV: {{trans('messages.website_title')}}</title>
  @if(isset($video))
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="UkumbiTV" />
		<meta property="og:description"   content="{{$video->title}}" />
		<meta property="og:image"         content="{{$video->videoimage->imgPreview1}}" />
  @endif

  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('r/img/favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('r/img/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('r/img/favicon-16x16.png')}}">
  <!-- <link rel="manifest" href="{{asset('r/img/favicon/manifest.json')}}"> -->
  <link rel="mask-icon" href="{{asset('r/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
  <meta name="theme-color" content="#ffffff">



  <!-- Allow AngularJS cloaked items to stay hidden on page load -->
	<style>
	[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak, .ng-hide:not(.ng-hide-animate) {
	    display: none !important;
	}
	</style>



	<!-- Reducing render blocking CSS -->
	<!-- Reducing render blocking CSS -->
	<!-- Reducing render blocking CSS -->
	<!-- https://github.com/filamentgroup/loadCSS -->
	<!-- critical css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- non critical css -->
  <link rel="preload" onload="this.rel='stylesheet'" as="style" href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,500i,700,900">
  <link rel="preload" onload="this.rel='stylesheet'" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="preload" onload="this.rel='stylesheet'" as="style" href="{{asset('r/css/style.css')}}">
  <link rel="preload" onload="this.rel='stylesheet'" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> 

  <!-- style map shouldn't be included for production -->
  <link rel="preload" onload="this.rel='stylesheet'" as="style" href="{{asset('r/css/style.css.map')}}">

  <noscript>
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,500i,700,900">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="{{asset('r/css/style.css')}}">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  	<link rel="stylesheet" href="{{asset('r/css/style.css.map')}}">
  </noscript>
  <script>
	/*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
	(function(w){
		"use strict";
		/* exported loadCSS */
		var loadCSS = function( href, before, media ){
			// Arguments explained:
			// `href` [REQUIRED] is the URL for your CSS file.
			// `before` [OPTIONAL] is the element the script should use as a reference for injecting our stylesheet <link> before
				// By default, loadCSS attempts to inject the link after the last stylesheet or script in the DOM. However, you might desire a more specific location in your document.
			// `media` [OPTIONAL] is the media type or query of the stylesheet. By default it will be 'all'
			var doc = w.document;
			var ss = doc.createElement( "link" );
			var ref;
			if( before ){
				ref = before;
			}
			else {
				var refs = ( doc.body || doc.getElementsByTagName( "head" )[ 0 ] ).childNodes;
				ref = refs[ refs.length - 1];
			}

			var sheets = doc.styleSheets;
			ss.rel = "stylesheet";
			ss.href = href;
			// temporarily set media to something inapplicable to ensure it'll fetch without blocking render
			ss.media = "only x";

			// wait until body is defined before injecting link. This ensures a non-blocking load in IE11.
			function ready( cb ){
				if( doc.body ){
					return cb();
				}
				setTimeout(function(){
					ready( cb );
				});
			}
			// Inject link
				// Note: the ternary preserves the existing behavior of "before" argument, but we could choose to change the argument to "after" in a later release and standardize on ref.nextSibling for all refs
				// Note: `insertBefore` is used instead of `appendChild`, for safety re: http://www.paulirish.com/2011/surefire-dom-element-insertion/
			ready( function(){
				ref.parentNode.insertBefore( ss, ( before ? ref : ref.nextSibling ) );
			});
			// A method (exposed on return object for external use) that mimics onload by polling document.styleSheets until it includes the new sheet.
			var onloadcssdefined = function( cb ){
				var resolvedHref = ss.href;
				var i = sheets.length;
				while( i-- ){
					if( sheets[ i ].href === resolvedHref ){
						return cb();
					}
				}
				setTimeout(function() {
					onloadcssdefined( cb );
				});
			};

			function loadCB(){
				if( ss.addEventListener ){
					ss.removeEventListener( "load", loadCB );
				}
				ss.media = media || "all";
			}

			// once loaded, set link's media back to `all` so that the stylesheet applies once it loads
			if( ss.addEventListener ){
				ss.addEventListener( "load", loadCB);
			}
			ss.onloadcssdefined = onloadcssdefined;
			onloadcssdefined( loadCB );
			return ss;
		};
		// commonjs
		if( typeof exports !== "undefined" ){
			exports.loadCSS = loadCSS;
		}
		else {
			w.loadCSS = loadCSS;
		}
	}( typeof global !== "undefined" ? global : this ));


	/*! loadCSS rel=preload polyfill. [c]2017 Filament Group, Inc. MIT License */
	(function( w ){
	  // rel=preload support test
	  if( !w.loadCSS ){
	    return;
	  }
	  var rp = loadCSS.relpreload = {};
	  rp.support = function(){
	    try {
	      return w.document.createElement( "link" ).relList.supports( "preload" );
	    } catch (e) {
	      return false;
	    }
	  };

	  // loop preload links and fetch using loadCSS
	  rp.poly = function(){
	    var links = w.document.getElementsByTagName( "link" );
	    for( var i = 0; i < links.length; i++ ){
	      var link = links[ i ];
	      if( link.rel === "preload" && link.getAttribute( "as" ) === "style" ){
	        w.loadCSS( link.href, link, link.getAttribute( "media" ) );
	        link.rel = null;
	      }
	    }
	  };

	  // if link[rel=preload] is not supported, we must fetch the CSS manually using loadCSS
	  if( !rp.support() ){
	    rp.poly();
	    var run = w.setInterval( rp.poly, 300 );
	    if( w.addEventListener ){
	      w.addEventListener( "load", function(){
	        rp.poly();
	        w.clearInterval( run );
	      } );
	    }
	    if( w.attachEvent ){
	      w.attachEvent( "onload", function(){
	        w.clearInterval( run );
	      } );
	    }
	  }
	}( this ));
	</script>
	<!-- Reducing render blocking CSS -->
	<!-- Reducing render blocking CSS -->
	<!-- Reducing render blocking CSS -->


	<!-- Allow IE legacy browsers to understand HTML5 -->
	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
	
	<!-- lazy loader for images (including responsive images) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/3.0.0/lazysizes.min.js" async=""></script>
</head>
<body data-search-route="{{route('search-data')}}">
 	{{--FACEBOOK CODE--}}
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1900426896906624";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

 	{{--GOOGLE ANALYTICS CODE--}}
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-106334552-1', 'auto');
	  ga('send', 'pageview');

	</script>




    @yield('layout')

</body>
	<!-- CDN libraries -->
	<!-- CDN libraries -->
	<!-- CDN libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <!-- Payment platform (stripe) -->
	<script src="https://js.stripe.com/v2/"></script>
	<!-- autocomplete librairy -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/bloodhound.min.js"></script>
  <!-- Alerts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>  

	<!-- Main JS file -->
	<!-- Main JS file -->
	<!-- Main JS file --> 
	<script src="{{asset('js/app.js')}}"></script>  

@yield('scripts')
</html>