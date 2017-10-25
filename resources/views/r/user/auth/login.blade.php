@extends('r.layouts.simple')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-authentication page-login
@endsection


@section('content')
	
	<style>
		.section-auth{
			margin-left: auto;
	    margin-right: auto;
	    max-width: 500px;
		}
		.header-auth {
			margin-bottom: 40px; 
		}
		.header-auth h1 {
			margin-bottom: 10px;
		}
		.header-auth h2 {
			font-size: 20px;
			color: #666;
		}

		.header-auth .nav-tabs .fa {
			font-size: 25px;
		}

		.header-auth .nav-tabs span {
			display: inline-block;
			margin: 0 0 5px 10px;
		}

		    
		.section-auth .tab-content {
			background: #fff;
    	padding: 50px 20px;
    	min-height: 450px;
		}
		#tab-facebook p {
			margin-bottom: 20px;
		}
		.page {
	    min-height: initial; 
		}
	</style>




	<header class="header-auth text-center">
		<h1>{{trans('messages.login_form_title')}}</h1>
		<h2>{{trans('messages.login_page_h2')}}</h2>
	</header>




	<div id="section-auth" class="section-auth" ng-app="validationApp" ng-controller="mainController">
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active">
	    	<a href="#tab-facebook" aria-controls="tab-facebook" role="tab" data-toggle="tab">
	    		<i class="fa fa-facebook-official" aria-hidden="true"></i> <span>{{trans('messages.login_via_fb')}}</span></a>
	   	</li>
	    <li role="presentation">
	    	<a href="#tab-email" aria-controls="tab-email" role="tab" data-toggle="tab"> 
	    		<i class="fa fa-envelope" aria-hidden="true"></i> <span>{{trans('messages.login_via_email')}}</span></a>
	    	</li> 
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content">

	    <div role="tabpanel" class="tab-pane active" id="tab-facebook">
				@if(config('services.facebook.client_id') && config('services.facebook.client_secret'))
			    <div class="text-center">
			      <p>{{trans('messages.auth_signin_blurb')}}</p>
			      <form class="social-form form-horizontal" role="form" method="POST" action="{{ route('SocialLogin') }}">
			        <input type="hidden" value="facebook" name="provider" id="provider">
			        {{--<a href="{{ route('SocialLogin') }}" class="btn btn-block btn-lg butn-dblue butn-face"><span class="icon icon-facebook"></span>{{trans('messages.auth_signin_fb')}}</a>--}}
			        <button type="submit" class="btn btn-block btn-lg butn-dblue butn-face"><span class="icon icon-facebook"></span>{{trans('messages.auth_signin_fb')}}</button>
			      </form>
			    </div>
			  @endif
	    </div><!-- tab-facebook -->

	    <div role="tabpanel" class="tab-pane" id="tab-email"> 
      	<form name="loginForm" action="{{route('user.login.post')}}" method="POST" autocomplete="off" novalidate>

					<!-- Email Address -->
		      <div class="form-group" ng-class="{ 'has-error' : loginForm.email.$invalid && !loginForm.email.$pristine }">
		        <label for="email">{{trans('messages.auth_enter_email')}} <span>*</span></label>
		        <input class="form-control" type="email" name="email" ng-model="user.email" required>
		        <div ng-cloak ng-show="loginForm.email.$invalid && !loginForm.email.$pristine" class="help-block">{{trans('messages.auth_error_email')}}</div> 
		      </div>


		      <!-- Password -->
		      <div class="form-group" ng-class="{ 'has-error' : loginForm.password.$invalid && !loginForm.password.$pristine }">
		        <label>{{trans('messages.auth_enter_password')}}</label>   
		        <input type="password" name="password" class="form-control" ng-model="user.password" ng-minlength="6" required>
		        <div ng-cloak ng-show="loginForm.password.$dirty && loginForm.password.$viewValue.length==0" class="help-block">{{trans('messages.auth_error_password1')}}</div> 
		        <div ng-cloak ng-show="loginForm.password.$error.minlength" class="help-block">{{trans('messages.auth_error_password2')}}</div>
		        <div ng-cloak ng-show="loginForm.password.$error.pattern" class="help-block">{{trans('messages.auth_error_password3')}}</div>
		    	</div>   
 
		      <div class="checkbox">
		      	<label for="remember">
		      		<input id="remember" type="checkbox"> {{trans('messages.auth_remember')}}
		      	</label>
		        <div class="block-forgot-pass fine-print">
		        	<a href="{{url('/password/reset')}}">{{trans('messages.auth_forgot_password')}}</a>
		        </div> 
		      </div>
 

		      <button type="submit" class="btn btn-block btn-cta1b btn-lg" ng-disabled="loginForm.$invalid">{{trans('messages.auth_signin')}}</button>
 

			    <div>
			        <span>{{trans('messages.auth_no_account')}}</span>
			        <a href="{{route('user.register.form')}}" class="sign-butn">{{trans('messages.auth_signup')}}</a>
			    </div>
		    </form><!-- loginForm -->
	    </div><!-- tab-email -->

	  </div><!-- tab-content -->
	</div><!-- section-auth --> 
@endsection











@section('scripts')
<script> 
	$(document).ready(function(){   
	});
</script>
@endsection