<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
  @if(isset($video))
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="UkumbiTV" />
  <meta property="og:description"   content="{{$video->title}}" />
  <meta property="og:image"         content="{{$video->videoimage->imgPreview1}}" />
  @endif
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,500i,700,900" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('r/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('r/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('r/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('r/img/favicon/manifest.json')}}">
    <link rel="mask-icon" href="{{asset('r/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('r/css/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('r/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('r/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('r/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('r/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('packages/sweetalert/sweetalert.css')}}">
    {{--<link rel="stylesheet" href="{{asset('r/css/less.css')}}">--}}
    <link rel="stylesheet" href="{{asset('r/css/passfield.min.css')}}">
    <link>
</head>
<body data-search-route="{{route('search-data')}}">
 
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1900426896906624";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>






    @yield('layout')

</body>
  <script type="text/javascript" src="{{asset('r/js/libs/jquery.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{asset('r/js/libs/passfield.min.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js"></script>
  <script type="text/javascript" src="{{asset('r/js/libs/slick.min.js')}}"></script>
  <!-- lightbox librairy
  <script type="text/javascript" src="{{asset('r/js/libs/jquery.colorbox-min.js')}}"></script>
-->

	<!-- autocomplete librairy -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>

  <script type="text/javascript" src="{{asset('packages/sweetalert/sweetalert.min.js')}}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/bloodhound.min.js"></script>

  <!--
  ... Will reactivate plugin another time ...
  <script type="text/javascript" src="{{asset('r/js/libs/Google-play-menu.js')}}"></script>
-->
  <script type="text/javascript" src="{{asset('r/js/libs/jQuery.YoutubeBackground.js')}}"></script>

  <script type="text/javascript" src="{{asset('r/js/libs/anchor-smooth-scroll.js')}}"></script>
		
		<!-- main script -->
  <script type="text/javascript" src="{{asset('r/js/main.js')}}"></script>





@yield('scripts')
</html>