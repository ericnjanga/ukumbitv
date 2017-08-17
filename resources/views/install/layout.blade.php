<!DOCTYPE html>
<html>
<head>
 	<title>{{Setting::get('site_name')}}</title>
  	<meta name="viewport" content="width=device-width,  initial-scale=1">
    <link rel="stylesheet" href="{{asset('install/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('install/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('install/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('install/css/animate.css')}}">
		

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
</head>

<body>

  	<div class="october">

  		<div class="install-page">

      		<div id="october-wrap">
		        <header>
		        	<div class="container" id="containerHeader">
		             	<div class="row">
		    				<div class="col-md-12 october-image">
		        				<img src="{{asset('logo.png')}}">
		        			</div><!--end of october-image-->
						</div><!--end of row-->          
					</div><!--end of container-header-->

			       	<section class="title">
			            <div class="container" id="containerTitle">
			            	<div class="row">
			    				<div class="col-md-7">
			        				<h2 class="animate move_right animated slideInRight">@if($title) {{$title}} @endif</h2>
			    				</div>
				    			<div class="col-md-5 visible-md visible-lg">
						            <div class="steps row animated slideInUp">
						                <div class="col-sm-4 animated slideInup" id="system_check"><p>1</p></div>
						                <div class="col-sm-4 animated slideInup" id="theme_install"><p>2</p></div>
						                <div class="col-sm-4 animated slideInup" id="other_install"><p>3</p></div>
						            </div><!--end of steps-->
				    			</div>
							</div> <!--end of row-->               
						</div><!--end of conatainertitle-->
			        </section><!--end of title-->
		    	</header>
		    </div>

		    <!--end of october-wrap-->

		    @yield('content')

		</div>

			@yield('footer')

  	</div>

  <!--end of october-->

  	<script src="{{asset('install/js/jquery.min.js')}}"></script>
    <script src="{{asset('install/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('install/js/script.js')}}"></script>

    @yield('scripts')

    <script type="text/javascript">
        $("#{{$page}}").addClass("active");
    </script>
</body>
</html>