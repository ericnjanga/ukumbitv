<!DOCTYPE html>
<html class="no-js">
	<head>
		@if (isset($videoTitle->title))
			<title>UkumbiTV, watch {{$videoTitle->title}}</title>
			@else
			<title>{{trans('messages.site_name')}} - {{trans('messages.website_description')}}</title>
			@endif

	    


	    <meta name="viewport" content="width=device-width,  initial-scale=1">
	    <link rel="stylesheet" href="{{asset('streamtube/css/bootstrap.min.css')}}"> 
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/app.css')}}"> 
	    <link rel="shortcut icon" type="image/png" href="{{asset('streamtube/images/logo2-fav.png')}}"/>
	    <script src="{{asset('streamtube/js/vendors/modernizr-custom.js')}}"></script>
	    @yield('styles') 

	    @yield('headscripts')
	</head>

	<body class="lang-{{App::getLocale()}} page-videos">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=1900426896906624";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

    @include('layouts.user.header-video')

		@yield('content')

    @include('layouts.user.footer')


  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
 		 
 		<script src="{{asset('streamtube/js/grid.js')}}"></script>
 		<script src="{{asset('streamtube/js/app.videos-landing.js')}}"></script> 
  	<!-- Video Page additional scripts --> 
    @yield('scripts') 
	</body>
</html>