@extends('r.layouts.simple')
@section('content')
  <div class="page-tersm-and-privacy">
    <div class="container">
			<div class="row"> 
			  <aside id="fixed-info" class="col-md-3 fixed-info">
			  	<ul class="list-unstyled">
			  		<li class="active">{{trans('messages.tos_title')}}</li>
			  		<li><a href="{{route('user.privacy_policy')}}">{{trans('messages.PP_title')}}</a></li>
			  		<li><a href="{{route('user.contact')}}">{{trans('messages.contact')}}</a></li>
			  	</ul> 
			  </aside>

			  <div class="col-md-7">
	    		<h1>{{trans('messages.tos_title')}}</h1>
			  	{!!trans('messages.tos_section1')!!}
			  	{!!trans('messages.tos_section2')!!}
			  	{!!trans('messages.tos_section3')!!}
			  	{!!trans('messages.tos_section4')!!}
			  	{!!trans('messages.tos_section5')!!}
			  	{!!trans('messages.tos_section6')!!}
			  	{!!trans('messages.tos_section7')!!}
			  	{!!trans('messages.tos_section8')!!}
			  	{!!trans('messages.tos_section9')!!}
			  	{!!trans('messages.tos_section10')!!}
			  	<p>... Complete text coming soon ...</p>
			  </div>  
			</div><!-- row -->
    </div><!-- container -->
  </div>


@endsection