@extends('layouts.user')


@section('body-class')
page-singlevideo
@endsection 


@section('styles')
@endsection



@section('headscripts')
	
@endsection



@section('content')
	@if(Auth::check())
	<!-- ..................[section1]................... -->
	<!-- Who can watch the video:  --> 
	<!-- 1) Is a subscriber -->
	<!-- 2) [Is within the one week grace period] or [is in good payment standing with paypal] --> 
	<!-- ..................................  -->


		<iframe src="https://player.vimeo.com/video/{{$videoId}}?autoplay=1" autoplay="1" width="100%" height="700" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>



		<!-- Facebook comment and share 
		*** WE WON'T USE FACEBOOK FOR COMMENTS ANY MORE ***
		<div class="container">
			<a name="comment_or_share"></a>
			<div class="row"> 
				<div class="col-comment col-md-6">
					<div class="fb-comments" data-colorscheme="dark" data-href="https://ukumbitv.com/watch/{{$video->watchid}}" data-numposts="5"></div>
				</div>
				 
				<div class="col-share col-md-6">
					<div class="fb-share-button" data-href="https://ukumbitv.com/watch/{{$video->watchid}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fukumbitv.com%2Fwatch%2F{{$video->watchid}}&amp;src=sdkpreparse">Share</a></div>
				</div>
			</div>
		</div>
		-->
	<!-- ..................[section1]................... -->
	<!-- ..................[section1]................... -->
	<!-- ..................[section1]................... -->



	<!-- ..................[section2]................... -->
	<!-- Those who can't watch the video:  -->
  	<div>
  		<ul>
  			<li>Display little info about the movie</li>
  			<!-- If the person is a subscriber:  -->
  			<li>Display a link to the payment page</li>
  			<!-- If the person is not a subscriber:  -->
  			<li>Display a link to the registration page</li>
  		</ul>
  	</div>
	<!-- ..................[section2]................... -->
	<!-- ..................[section2]................... -->
	<!-- ..................[section2]................... -->
	@else
		<div>
			<ul>
				<li>
					<img src="{{ $images->imgBillboard }}">
				</li>
				<!-- If the person is a subscriber:  -->
				<li>TITLE: {{ $video->title }}</li>
				<!-- If the person is not a subscriber:  -->
				<li>
					<a href="{{ route('user.login.form') }}">LOGIN</a>
					<a href="{{ route('user.register.form') }}">REGISTER</a>
				</li>
			</ul>
		</div>
	@endif

@endsection



 



@section('scripts')
  <script src="{{asset('streamtube/js/app.single-video.js')}}"></script>
@endsection
