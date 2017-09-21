@extends('r.layouts.simple')
@section('content')
  <div class="page page-tersm-and-privacy">
    <div class="container">
			<div class="row"> 
			  <aside id="fixed-info" class="col-md-3 fixed-info">
			  	<ul class="list-unstyled">
			  		<li><a href="{{route('user.terms-condition')}}">{{trans('messages.tos_title')}}</a></li>
			  		<li class="active">{{trans('messages.PP_title')}}</a></li>
			  		<li><a href="{{route('user.contact')}}">{{trans('messages.contact')}}</a></li>
			  	</ul> 
			  </aside>

			  <div class="col-md-7">
	    		<h1>{{trans('messages.PP_title')}}</h1>
			  	<p>Coming Soon ...</p>
			  </div> 
			</div><!-- row --> 
    </div><!-- container -->
  </div>
@endsection