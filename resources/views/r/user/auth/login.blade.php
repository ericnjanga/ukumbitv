@extends('r.layouts.simple')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-authentication page-login
@endsection


@section('content')
	
	<style>
		.page {
	    min-height: initial; 
		}
		#collapse-facebook .panel-body {
			min-height: 400px; 
	    min-height: 400px;
	    display: flex;
	    align-items: center;
	    justify-content: center;
		}
		#collapse-facebook .text-center {
		  width: 100%;	
		}
		#log-accordion .panel {
			border-width: 0;
    	border-radius: 0;
		}
		#log-accordion .panel-heading {
			padding: 0;
		}
		#log-accordion .panel-title a {
			position: relative;
			display: block; 
    	padding: 15px;
    	color: #fff;
    	font-weight: bold; 
    	padding-left: 40px;
		  background-color: rgba(12, 90, 19, 1);
		}
		#log-accordion .panel-title a:hover {
		  background-color: rgba(12, 90, 19, 0.7);
		}

		/*--- ---*/
		.panel-heading .panel-title a.active {
			color: #333!important;
		  background-color: rgba(180, 180, 180, 0.6)!important;
		}
		.panel-heading .panel-title .glyphicon { 
			position: absolute;
			left: 15px;
    	top: 25px;
			transition: all 0.3s ease;
    	line-height: 0;
		}
		.panel-heading .panel-title a.active .glyphicon {
		  transform: rotate(180deg);
		  opacity: 0;
    	line-height: 0;
		}

		    


		#log-accordion .panel-title a:hover,
		#log-accordion .panel-title a:focus,
		#log-accordion .panel-title a:active {
			text-decoration: none;
		}
		#log-accordion .panel+.panel {
			margin-top: 0;
		}
		#log-accordion .panel {
			box-shadow: 0 0 0 rgba(0,0,0,.05);
		}

		 

	</style>
 
  <div class="page page-auth" ng-app="validationApp" ng-controller="mainController" style="padding: 0;">
  	<div class="panel-group" id="log-accordion" role="tablist" aria-multiselectable="true">
		  <div class="panel panel-default panel-facebook">
		    <div class="panel-heading panel-heading-facebook" role="tab" id="headingOne" style="display:none;">
		      <h4 class="panel-title">
		        <a role="button" data-toggle="collapse" data-parent="#log-accordion" href="#collapse-facebook" aria-expanded="true" aria-controls="collapse-facebook">
		        	<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
		          {{trans('messages.auth_signin_fb')}}
		        </a>
		      </h4>
		    </div>
		    <div id="collapse-facebook" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body"> 
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
		      </div><!-- panel-body -->
		    </div>
		  </div><!-- panel-email -->
		  <div class="panel panel-default panel-email">
		    <div class="panel-heading panel-heading-email" role="tab" id="headingTwo">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#log-accordion" href="#collapse-email" aria-expanded="false" aria-controls="collapse-email">
		        	<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
		          {{trans('messages.auth_signin_email')}}
		        </a>
		      </h4>
		    </div>
		    <div id="collapse-email" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="panel-body" style="padding: 20px;">
		        	
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

		      </div>
		    </div>
		  </div><!-- panel-email -->
		</div>
  </div><!-- page-auth -->
 
@endsection











@section('scripts')
<script>

	$(document).ready(function(){
		//Always keep one panel open
		$('#log-accordion .panel-heading a').on('click',function(e){
	    if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
	    	// e.preventDefault();
	      e.stopPropagation();
	    }
	    // You can also add preventDefault to remove the anchor behavior that makes
	    // the page jump
	    // e.preventDefault();
		});



		console.log('*/////*' );
		//Activate current tab
		$('.collapse.in').prev('.panel-heading').find('.panel-title a').addClass('active');

		// $('#log-accordion').on('hidden.bs.collapse', function(){
		// 	console.log('.....', $(this));
		// });

		//Activate tab after collapse...
		$('#log-accordion').on('hidden.bs.collapse', function () {
			window.setTimeout(function(){
				console.log('????dcdsv????');
			   
			//   $('a[data-toggle="collapse"].active').removeClass('active');
			// //Activate current tab
			// $('.collapse.in').prev('.panel-heading').find('.panel-title a').addClass('active');


				$('a[data-toggle="collapse"].active').removeClass('active').parents('.panel-heading').fadeOut();
			//Activate current tab
			$('.collapse.in').prev('.panel-heading')fadeIn().find('.panel-title a').addClass('active');


			}, 150);
		});

		// //Activate tab after collapse...
		// $('#log-accordion').on('hidden.bs.collapse', function () {
		// 	window.setTimeout(function(){
		// 		console.log('>>>>2222', $('.collapse:not(.in)').prev('.panel-heading').find('.panel-title a').length);
		// 	  // do something…
		// 	  $('.collapse:not(.in)').prev('.panel-heading').find('.panel-title a').addClass('active');
		// 	}, 100);
		// });
	});
</script>
@endsection