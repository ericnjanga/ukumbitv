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
		  	{{{trans('messages.tos_section1')}}}
		  </div>  
    </div><!-- container -->
  </div>


@endsection