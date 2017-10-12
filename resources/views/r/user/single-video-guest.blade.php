@extends('r.layouts.app')

@section('layout')
    <header class="ukb-main-header">
      <nav class="navbar navbar-default">
          <div class="container-fluid">
              <!-- Brand and toggle -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">{{trans('messages.toggle_navigation')}}</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="ukb-navbar-brand navbar-brand" href="/"><img src="{{asset('r/img/logo.png')}}" alt="UkumbiTV" title="UkumbiTV"></a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                      <li>
                          <a href="{{route('user.login.form')}}" class="btn btn-link btn-lg">{{trans('messages.auth_signin')}}</a>
                      </li>
                  </ul>
              </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
      </nav> 
    </header>



		<style>
			.main-container{
				padding-left: 50px;
    		padding-right: 50px;
    		margin-top: 60px;
    		margin-bottom: 60px;
    		max-width: 1000px;
    		margin-left: auto;
    		margin-right: auto;
			}
			.main-container hr{
				margin-top: 40px;
				margin-bottom: 40px;
			}
			h1{
				margin-bottom: 5px; 
			}
			h2{
				margin-bottom: 20px; 
				    font-size: 18px;
			}
			.list-date-duration {
				margin-bottom: 15px;
			} 

			@media (max-width: 767px) {
				.img-block {
					margin: 0 auto;
    			display: block;
				}
				.list-cta {
					text-align: center;
				}
				.video-description {
					text-align: center;
			    margin-top: 30px;
			    max-width: 500px;
			    margin-left: auto;
			    margin-right: auto;
				}
				.main-container hr{
					margin-top: 20px;
					margin-bottom: 20px;
				}
			}
		</style>


    <main class="main-container container-fluid">
      <!-- @yield('content') --> 
      <!-- <div class="info-block hero-sub"> -->
    	<div class="row">
    		<div class="col-sm-12"> 
      		<div class="row">
      			<div class="col-sm-4">
	      			<img class="img-block" src="{{$video->videoimage->imgPreview1}}" alt="">
	      		</div>
	      		<article class="video-description col-sm-8">
	      			<h1 class="title">{{$video->title}}</h1>
	      			<ul class="list-date-duration list-inline">
	              <li>{{$video->year}}</li>
	              <li class="bold">{{$video->country}}</li>
	            </ul> 

	      			<p>{{$video->description}}</p>

	      			<hr>

	      			<h2>To enjoy this movie, please:</h2>

		      		<ul class="list-cta list-inline"> 
		      			<li>
		      				<a href="{{route('user.login.form')}}" class="btn btn-block btn-primary btn-lg">{{trans('messages.auth_signin')}}</a>
		      			</li>

		      			<li>{{trans('messages.auth_or')}}</li>

		      			<li><a href="{{route('user.register.form')}}" class="btn btn-block btn-cta1b btn-lg">{{trans('messages.auth_signup')}}</a></li>
		      		</ul>  
	      		</article> 
      		</div><!-- row --> 
    		</div><!-- col-sm-12 -->
    	</div><!-- row --> 
    </main>
    @include('r.chunks._footer_main')
@endsection