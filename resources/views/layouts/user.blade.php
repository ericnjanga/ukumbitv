<!DOCTYPE html>
<html class="no-js">
<head>
    <title>{{trans('messages.site_name')}} - {{trans('messages.website_description')}}</title>
    
    <meta name="viewport" content="width=device-width,  initial-scale=1">
    <link rel="stylesheet" href="{{asset('streamtube/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/app.css')}}"> 
    <link rel="shortcut icon" type="image/png" href="{{asset('streamtube/images/logo2-fav.png')}}"/>
    <script src="{{asset('streamtube/js/vendors/modernizr.custom.js')}}"></script>
    <!--  
    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/responsive.css')}}"> --> 
    @yield('styles') 
</head>

<body>

    @include('layouts.user.header')

    <div class="common-youtube">

        @yield('content')

    </div>

    @include('layouts.user.footer')
    
    <script src="{{asset('streamtube/js/vendors/jquery.min.js')}}"></script>
    <script src="{{asset('streamtube/js/vendors/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{asset('streamtube/js/vendors/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('streamtube/js/vendors/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('streamtube/js/vendors/script.js')}}"></script>

		
		<!-- For background images slider -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
		
		<!-- App decoration -->
    <script type="text/javascript" src="{{asset('streamtube/js/app.decoration.js')}}"></script>


    <script>
        // $(document).ready(function(){
     
        //     $('.box').slick({
        //           dots: true,
        //           infinite: false,
        //           speed: 300,
        //           slidesToShow: 5,
        //             arrows: true,
        //           slidesToScroll: 5,
        //           responsive: [
        //             {
        //               breakpoint: 1024,
        //               settings: {
        //                 slidesToShow: 3,
        //                 slidesToScroll: 3,
        //                 infinite: true,
        //                 dots: true
        //               }
        //             },
        //             {
        //               breakpoint: 600,
        //               settings: {
        //                 slidesToShow: 2,
        //                 slidesToScroll: 2
        //               }
        //             },
        //             {
        //               breakpoint: 480,
        //               settings: {
        //                 slidesToShow: 1,
        //                 slidesToScroll: 1
        //               }
        //             }
        //             // You can unslick at a given breakpoint now by adding:
        //             // settings: "unslick"
        //             // instead of a settings object
        //           ]
        //     });
        // });

    </script>

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

        //                     window.location.href = "{{route('search-all', array('q' => 'all'))}}";

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

    @yield('scripts')

    <script type="text/javascript">
        @if(isset($page))
            $("#{{$page}}").addClass("active");
        @endif
    </script>

</body>

</html>