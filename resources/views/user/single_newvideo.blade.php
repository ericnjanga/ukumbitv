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
		.videopanel {
			position: relative;
			min-height: 700px;
		}
		.not-auth-frame:after,
		.not-auth-frame{
			position: absolute;
			width: 100%;
			height: 100%;
			background-repeat: no-repeat;
			background-size: cover;
		}
		.not-auth-frame:after{
			content: '';
			background-color: rgba(0,0,0,0.7);
		}
		.description{
			margin-top: 100px;
		}
		.description h1,
		.description p{
			margin-bottom: 40px;
		}
		.description .btn {
			margin-bottom: 15px;
			padding: 12px;
			border-width: 0px;
		}
		.btn-secondary {
			background-color: #3B5998;
			color: #fff;
		}
		.container{
			position: relative;
			z-index: 2;
		}
	</style>
		<div class="videopanel">
			<div class="not-auth-frame" style="background: url({{ $images->imgBillboard }})"></div>

			<div class="container">
				<div class="row">
					<div class="description col-md-3 col-md-offset-6">
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
		</div><!-- videopanel -->
	@endif

@endsection



 



@section('scripts')
  <script src="{{asset('streamtube/js/app.single-video.js')}}"></script>
@endsection
