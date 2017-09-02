@extends('r.layouts.simple')
@section('content')
  <div class="page-tersm-and-privacy">
    <div class="container">

		  <aside id="fixed-info" class="col-md-3 fixed-info">
		  	<ul class="list-unstyled">
		  		<li class="active">{{trans('messages.tos_title')}}</li>
		  		<li><a href="{{route('user.privacy_policy')}}">{{trans('messages.PP_title')}}</a></li>
		  		<li><a href="{{route('user.contact')}}">Contact us</a></li>
		  	</ul> 
		  </aside>

		  <div class="col-md-7">
    		<h1>{{trans('messages.tos_title')}}</h1>
		  	<p class="content-text">Scarlett Johansson stars in the visually stunning Ghost in the Shell, an action-packed adventure set in a future world where people are enhanced with technology. Believing she was rescued from near death, Major (Johansson) becomes the first of her kind: a human mind inside an artificial body designed to fight the war against cyber-crime. While investigating a dangerous criminal, Major makes a shocking discovery – the corporation that created her lied about her past life in order to control her. Unsure what to believe, Major will stop at nothing to unravel the mystery of her true identity and exact revenge against the corporation she was built to serve.</p> 
		  </div>  
    </div><!-- container -->
      
      <!-- <div class="row justify-content-center"> -->
      <!-- <div class="col-sm-12 col-md-10 col-lg-7 col-xl-6"> -->
      <!-- <div class="content-block"> -->
          <!-- <div class="img-block">
              <img src="{{asset('r/img/landing-bg.png')}}" alt="">
          </div> -->
    
  </div>


@endsection