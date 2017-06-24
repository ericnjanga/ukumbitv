<!DOCTYPE html>
<html>

<head>
    <title>{{Setting::get('site_name' , "StreamHash")}}</title>
    
    <meta name="viewport" content="width=device-width,  initial-scale=1">
    <link rel="stylesheet" href="{{asset('streamtube/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('streamtube/css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/slick-theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/style.css')}}">

    <!-- <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/responsive.css')}}"> -->

    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/app.css')}}">

    <link rel="shortcut icon" type="image/png" href="@if(Setting::get('site_icon')) {{Setting::get('site_icon')}} @else {{asset('img/favicon.png')}} @endif"/>

   
    @yield('styles')

</head>

<body class="@yield('body-class')">

    @include('layouts.user.focused-nav')

    @yield('content')

    @include('layouts.user.footer')    
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- background images slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
    

    @yield('scripts')


</body>



</html>