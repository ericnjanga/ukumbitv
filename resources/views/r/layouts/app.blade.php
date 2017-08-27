<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,500i,700,900" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('r/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('r/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('r/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('r/img/favicon/manifest.json')}}">
    <link rel="mask-icon" href="{{asset('r/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.css">
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
<body>
    @yield('layout')

</body>
    <script type="text/javascript" src="{{asset('r/js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('r/js/passfield.min.js')}}"></script>
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js"></script>
    <script type="text/javascript" src="{{asset('r/js/slick.min.js')}}"></script>
    <!-- lightbox librairy
    <script type="text/javascript" src="{{asset('r/js/jquery.colorbox-min.js')}}"></script>
  -->
    <script type="text/javascript" src="{{asset('r/js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('r/js/Google-play-menu.js')}}"></script>
    <script type="text/javascript" src="{{asset('packages/sweetalert/sweetalert.min.js')}}"></script> 
@yield('scripts')
</html>