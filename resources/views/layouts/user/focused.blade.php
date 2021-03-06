<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{Setting::get('site_name' , "Stream Hash")}}</title>

    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/jquery-ui.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/layerslider/css/layerslider.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    
		

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


    @yield('styles')

</head>

<body>

    <div class="off-canvas-wrapper">

        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

            <!--header-->

            <!--off-canvas position-left light-off-menu end-->

            <div class="off-canvas-content" data-off-canvas-content>

                @include('layouts.user.header')

                <!-- End Header -->

                <!-- layerslider -->

                <!--end slider-->

                @yield('content')

                <!-- End main content -->

                @include('layouts.user.footer')

            </div>

            <!--end off canvas content-->

        </div>

        <!--end off canvas wrapper inner-->

    </div>

    <!--end off canvas wrapper-->

    <!-- script files -->
    <script src="{{asset('assets/bower_components/jquery/dist/jquery.js')}}"></script>

    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/bootstrap/js/jquery-ui.js')}}"></script>

    <script src="{{asset('assets/bower_components/what-input/what-input.js')}}"></script>
    <script src="{{asset('assets/bower_components/foundation-sites/dist/foundation.js')}}"></script>
    <script src="{{asset('assets/js/jquery.showmore.src.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/layerslider/js/greensock.js')}}" type="text/javascript"></script>

    <!-- LayerSlider script files -->
    <script src="{{asset('assets/layerslider/js/layerslider.transitions.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layerslider/js/layerslider.kreaturamedia.jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/inewsticker.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.kyco.easyshare.js')}}" type="text/javascript"></script>

    @yield('scripts')

      <script type="text/javascript">

        // jQuery(document).ready( function () {
        //     //autocomplete
        //     jQuery("#auto_complete_search").autocomplete({
        //         source: "{{route('search')}}",
        //         minLength: 1,
        //         select: function(event, ui){

        //             // set the value of the currently focused text box to the correct value

        //             if (event.type == "autocompleteselect"){

        //                 // console.log( "logged correctly: " + ui.item.value );

        //                 var username = ui.item.value;

        //                 if(ui.item.value == 'View All') {

        //                     // console.log('View AALLLLLLLLL');

        //                     window.location.href = "{{route('search', array('q' => 'all'))}}";

        //                 } else {
        //                     // console.log("User Submit");

        //                     jQuery('#auto_complete_search').val(ui.item.value);

        //                     jQuery('#userSearch').submit();
        //                 }

        //             }
        //         }      // select

        //     });

        // });

    </script>


</body>
</html>
