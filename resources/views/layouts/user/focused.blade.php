<!DOCTYPE html>
<html class="no-js">
	<head>
	  <title>{{trans('messages.site_name')}} - {{trans('messages.website_description')}}</title>
	  
	  <meta name="viewport" content="width=device-width,  initial-scale=1">
	  <link rel="stylesheet" href="{{asset('streamtube/css/bootstrap.min.css')}}"> 
	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	  <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/app.css')}}">


		

		<!-- favicons --> 
		<!-- favicons --> 
		<link rel="apple-touch-icon" sizes="57x57" href="{{asset('streamtube/images/favicons/apple-icon-57x57.png')}}">
		<link rel="apple-touch-icon" sizes="60x60" href="{{asset('streamtube/images/favicons/apple-icon-60x60.png')}}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{asset('streamtube/images/favicons/apple-icon-72x72.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{asset('streamtube/images/favicons/apple-icon-76x76.png')}}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{asset('streamtube/images/favicons/apple-icon-114x114.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{asset('streamtube/images/favicons/apple-icon-120x120.png')}}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{asset('streamtube/images/favicons/apple-icon-144x144.png')}}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{asset('streamtube/images/favicons/apple-icon-152x152.png')}}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{asset('streamtube/images/favicons/apple-icon-180x180.png')}}">
		<link rel="icon" type="image/png" sizes="192x192"  href="{{asset('streamtube/images/favicons/android-icon-192x192.png')}}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{asset('streamtube/images/favicons/favicon-32x32.png')}}">
		<link rel="icon" type="image/png" sizes="96x96" href="{{asset('streamtube/images/favicons/favicon-96x96.png')}}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{asset('streamtube/images/favicons/favicon-16x16.png')}}">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="{{asset('streamtube/images/favicons/ms-icon-144x144.png')}}">
		<meta name="theme-color" content="#ffffff">
		<!-- favicons -->
		<!-- favicons --> 
		
	  <script src="{{asset('streamtube/js/vendors/modernizr-custom.js')}}"></script> 
	  @yield('styles') 
	</head>

	<body class="@yield('body-class')"> 

		 @yield('content')

		 
<!--
    @include('layouts.user.focused-nav')

    

    @include('layouts.user.footer') 
  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- background images slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>  
    @yield('scripts')
	</body>
</html>