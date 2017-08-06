<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{Setting::get('site_name' , "Live Stream")}}</title>

        <meta name="description" content="">
        <meta name="author" content="">

        <link href="{{asset('adult/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('adult/css/jquery-ui.css')}}">
        <link href="{{asset('adult/css/style.css')}}" rel="stylesheet">

        
		

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

        <style type="text/css">
            .ui-autocomplete{
              z-index: 99999;
            }
        </style>

        @if(Setting::get('google_analytics'))
            <?php echo Setting::get('google_analytics'); ?>
        @endif

        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{Setting::get('site_name' , 'Stream Hash')}}" />
        <meta property="og:description" content="The best solution to start up a video streaming venture!" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="{{Setting::get('site_name' , 'Stream Hash')}}" />
        <meta property="og:image" content="{{Setting::get('site_icon')}}" />

        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:description" content="The best solution to start up a video streaming venture!"/>
        <meta name="twitter:title" content="{{Setting::get('site_name' , 'Stream Hash')}}"/>
        <meta name="twitter:image:src" content="@if(Setting::get('site_icon')) {{ Setting::get('site_icon') }} @else {{asset('favicon.png') }} @endif"/>

    </head>

    <body>

        <div class="container-fluid">

            @include('layouts.user.nav')

            <div class="row page-content">

                <div class="container">

                    <div class="row">

                        @yield('content')

                    </div>

                </div>

            </div>

            @include('layouts.user.footer')

        </div>

        <script src="{{asset('adult/js/jquery.min.js')}}"></script>
        <script src="{{asset('adult/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/jquery-ui.js')}}"></script>
        <script src="{{asset('adult/js/scripts.js')}}"></script>

        @yield('scripts')


        <script type="text/javascript">
                $("#{{$page}}").addClass("active");
        </script>

        <script type="text/javascript">

            jQuery(document).ready( function () {
                //autocomplete
                jQuery("#auto_complete_search").autocomplete({
                    source: "{{route('search')}}",
                    minLength: 1,
                    select: function(event, ui){

                        // set the value of the currently focused text box to the correct value

                        if (event.type == "autocompleteselect"){

                            // console.log( "logged correctly: " + ui.item.value );

                            var username = ui.item.value;

                            if(ui.item.value == 'View All') {

                                // console.log('View AALLLLLLLLL');

                                window.location.href = "{{route('search-all', array('q' => 'all'))}}";

                            } else {
                                // console.log("User Submit");

                                jQuery('#auto_complete_search').val(ui.item.value);
                                jQuery('[name=key]').val(ui.item.value);

                                jQuery('#userSearch').submit();
                            }

                        }
                    }      // select

                });

            });

        </script>

    </body>
</html>
