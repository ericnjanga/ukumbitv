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
				margin-top: 20px;
				margin-bottom: 20px;
			}
			h1{
				margin-bottom: 5px; 
			}
			.list-date-duration {
				margin-bottom: 15px;
			}
			.list-cta {
				display: flex; 
		    justify-content: center;
			}
		</style>


    <main class="main-container container-fluid">
      <!-- @yield('content') --> 
      <!-- <div class="info-block hero-sub"> -->
      	<div class="row">
      		<div class="col-sm-12"> 
	      		<div class="row">
	      			<div class="col-sm-4">
		      			<img src="{{$video->videoimage->imgPreview1}}" alt="">
		      		</div>
		      		<div class="col-sm-8">
		      			<h1 class="title">{{$video->title}}</h1>
		      			<ul class="list-date-duration list-inline">
		              <li>{{$video->year}}</li>
		              <li class="bold">{{$video->country}}</li>
		            </ul> 
		      			<p>{{$video->description}}</p>
		      		</div> 
	      		</div><!-- row --> 
      		</div><!-- col-sm-12 -->

	      		<hr>

      		<ul class="list-cta list-inline col-sm-12"> 
      			<li>
      				<a href="{{route('user.login.form')}}" class="btn btn-block btn-primary btn-lg">{{trans('messages.auth_signin')}}</a>
      			</li>

      			<li class="or-line upper">{{trans('messages.auth_or')}}</li>

      			<li><a href="{{route('user.register.form')}}" class="btn btn-block btn-cta1b btn-lg">{{trans('messages.auth_signup')}}</a></li>
      		</ul> 
      	</div>
        

    </main>
    @include('r.chunks._footer_main')
@endsection