<!DOCTYPE html>
<html class="no-js">
	<head>
		@if (isset($videoTitle->title))
			<title>UkumbiTV ...</title>
		@else
			<title>{{trans('messages.site_name')}} - {{trans('messages.website_description')}}</title>
		@endif

	    <meta name="viewport" content="width=device-width,  initial-scale=1">
	    <link rel="stylesheet" href="{{asset('streamtube/css/bootstrap.min.css')}}"> 
	    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->  
	    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/app.css')}}"> 
	    <link rel="shortcut icon" type="image/png" href="{{asset('streamtube/images/logo2-fav.png')}}"/>
	    <!-- <script src="{{asset('streamtube/js/vendors/modernizr-custom.js')}}"></script> -->
	    @yield('styles') 

	    @yield('headscripts')
	</head>

	<body class="lang-{{App::getLocale()}} @yield('body-class')">

    @include('layouts.user.header-info') 
		
		<div class="container main-content">
		  <div class="row">
		  	<div class="col-md-12">
		  		@yield('content')
		  	</div>
		  </div>
		</div><!-- main-content -->
		

    @include('layouts.user.footer')

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @yield('scripts') 
	</body>
</html>