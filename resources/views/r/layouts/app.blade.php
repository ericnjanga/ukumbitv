<!doctype html>
<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport"
	        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <meta name="csrf-token" content="{{csrf_token()}}">
	  <title>UkumbiTV: {{trans('messages.website_title')}}</title>
	  @if(isset($video))
			<meta property="og:type"          content="website" />
			<meta property="og:title"         content="UkumbiTV" />
			<meta property="og:description"   content="{{$video->title}}" />
			<meta property="og:image"         content="{{$video->videoimage->imgPreview1}}" />
	  @endif

	  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('r/img/favicon/apple-touch-icon.png')}}">
	  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('r/img/favicon-32x32.png')}}">
	  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('r/img/favicon-16x16.png')}}">
	  <!-- <link rel="manifest" href="{{asset('r/img/favicon/manifest.json')}}"> -->
	  <link rel="mask-icon" href="{{asset('r/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
	  <meta name="theme-color" content="#ffffff">



	  <!-- Allow AngularJS cloaked items to stay hidden on page load -->
		<style>
		[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak, .ng-hide:not(.ng-hide-animate) {
		    display: none !important;
		}
		</style>



		<!-- Reducing render blocking CSS -->
		<!-- Reducing render blocking CSS -->
		<!-- Reducing render blocking CSS -->
		<!-- https://github.com/filamentgroup/loadCSS -->
		<!-- critical css -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,500i,700,900">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.css">
	  <link rel="stylesheet" href="{{asset('r/css/style0376.css')}}">
	  <link rel="stylesheet" href="{{asset('r/css/style.css.map')}}">
	 
		
		<!-- Allow IE legacy browsers to understand HTML5 -->
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
		<![endif]-->
		
		<!-- lazy loader for images (including responsive images) -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/3.0.0/lazysizes.min.js" async></script>
	</head>
	<body data-search-route="{{route('search-data')}}" data-active-lang="{{App::getLocale()}}" class="@yield('body-class')">


		<span id="msg-auth-confirm-reminder1" data-text="{{trans('messages.auth_confirm_reminder1')}}"></span>
		<span id="msg-auth-confirm-reminder2" data-text="{{trans('messages.auth_confirm_reminder2')}}"></span>

		@include('r.chunks._spinner-animated')
 
	 	{{--FACEBOOK CODE--}}
	  <div id="fb-root"></div>
	  <script>(function(d, s, id) {
	          var js, fjs = d.getElementsByTagName(s)[0];
	          if (d.getElementById(id)) return;
	          js = d.createElement(s); js.id = id;
	          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1900426896906624";
	          fjs.parentNode.insertBefore(js, fjs);
	      }(document, 'script', 'facebook-jssdk'));</script>

	 	{{--GOOGLE ANALYTICS CODE--}}
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-106334552-1', 'auto');
		  ga('send', 'pageview');

		</script>



		<?php
			//SET LOCALE DEPENDING ON BROWSER LANGUAGE
			//(EN by default, FR is necessary)
			//NEXT: Make this script smarter
			//-> Save language preference in cookie
			$locale = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

			if($locale=='fr' || $locale=='en'){
				App::setLocale($locale);
			}else{
				App::setLocale('en');
			}  
		?>



  




	@yield('layout')




 






	<!-- CDN libraries -->
	<!-- CDN libraries -->
	<!-- CDN libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular-animate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/classie/1.0.1/classie.min.js"></script>  
  <!-- Payment platform (stripe) -->
	<script src="https://js.stripe.com/v2/"></script>
	<!-- autocomplete librairy -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/bloodhound.min.js"></script>
  <!-- Alerts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.js"></script>
  <!--
	<script src="https://luwes.github.io/vimeowrap.js/vimeowrap.js"></script>
	<script src="https://luwes.github.io/vimeowrap.js/vimeowrap.playlist.js"></script>
-->

	<!-- Main JS file -->
	<script src="{{asset('js/app0376.js')}}"></script> 


	@if(Auth::check())
		@if(!Auth::user()->isVerified())
		<script>
			// var msg1 = $('#msg-auth-confirm-reminder1').data('text'),
			// 		msg2 = $('#msg-auth-confirm-reminder2').data('text');
			// 			// swal(msg1, msg2, 'info');
			// 			swal({
			//   title: msg1,
			//   type: 'info',
			//   html:
			//     'You can use <b>bold text</b>, ' +
			//     '<a href="//github.com">links</a> ' +
			//     'and other HTML tags',
			//   showCloseButton: true,
			//   showCancelButton: true,
			//   focusConfirm: false,
			//   confirmButtonText:
			//     '<i class="fa fa-thumbs-up"></i> Great!',
			//   confirmButtonAriaLabel: 'Thumbs up, great!',
			//   cancelButtonText:
			//   '<i class="fa fa-thumbs-down"></i>',
			//   cancelButtonAriaLabel: 'Thumbs down',
			// })

swal({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false
}).then(function () {
  swal(
    'Deleted!',
    'Your file has been deleted.',
    'success'
  )
}, function (dismiss) {
  // dismiss can be 'cancel', 'overlay',
  // 'close', and 'timer'
  if (dismiss === 'cancel') {
    swal(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})


		</script>
			<!-- <div class="alert__force-notice alert alert-info text-center" role="alert">
				{{trans('messages.auth_confirm_reminder1')}}
				<a href="{{route('user.confirm-user-email')}}"><b>{{trans('messages.auth_confirm_reminder2')}}</b></a> <i class="fa fa-smile-o" aria-hidden="true"></i>
			</div> -->
		@endif
	@endif





	@yield('scripts')

	</body>
</html>