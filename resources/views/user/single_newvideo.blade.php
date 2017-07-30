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
	<style>
		.videopanel.not-auth .description{
			margin-top: 50px;
		}
		.videopanel.not-auth{
			position: absolute;
			width: 100%;
			height: 100%;
			background-repeat: no-repeat;
			background-size: cover;
		}
		.btn-secondary {
			background-color: #3B5998;
		}
	</style>
		<div class"not-auth videopanel" style="background: url({{ $images->imgBillboard }})"></div>

		<div class="container">
			<div class="row">
				<div class="description col-md-3 col-md-offset-9">
					<h1>{{ $video->title }}</h1>
					<p>{{ $video->description }}</p>
					<footer class="row">
						<div class="col-md-12">
							<a class="btn btn-block btn-primary" href="{{ route('user.login.form') }}">LOGIN</a>
						</div>
						<div class="col-md-12">
							<a class="btn btn-block btn-secondary" href="{{ route('user.register.form') }}">REGISTER</a>
						</div>
					</footer>
				</div>
			</div>
		</div>
	@endif

@endsection



 



@section('scripts')
  <script src="{{asset('streamtube/js/app.single-video.js')}}"></script>
@endsection
