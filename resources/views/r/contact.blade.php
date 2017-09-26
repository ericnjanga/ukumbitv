@extends('r.layouts.simple')
@section('content')
  <div class="page page-tersm-and-privacy page-contact">
    <div class="container">

			<div class="row">
			  <aside id="fixed-info" class="col-md-3 fixed-info">
			  	<ul class="list-unstyled">
			  		<!-- <li><a href="{{route('user.terms-condition')}}">{{trans('messages.tos_title')}}</a></li>
			  		<li><a href="{{route('user.privacy_policy')}}">{{trans('messages.PP_title')}}</a></li> -->

			  		<li><a href="#">{{trans('messages.tos_title')}}</a></li>
			  		<li><a href="#">{{trans('messages.PP_title')}}</a></li>
			  		<li class="active">{{trans('messages.contact_us')}}</li>
			  	</ul> 
			  </aside>

			  <div class="col-md-9">
	        <header>
	        	<h1>{{trans('messages.contact_us')}}</h1>
	        </header>
	        <div class="row">
	        	<div class="col-md-5 contact-text">
	        		<p>{{trans('messages.PCONTACT_p1')}}</p>
	        		<p>{{trans('messages.PCONTACT_p2')}}</p>

	      			<hr>

	        		<ul class="list-unstyled link-yellow-green-hover">
	        			<li>
	        				<span class="icon icon-envelope"></span>
	        				<a href="mailto:info@gmail.com">info@gmail.com</a>
	        			</li>s
	        			<li>
	        				<span class="icon icon-phone-receiver"></span>
	        				<span>+1 647-704-7219</span>
	        			</li>
	        		</ul>

	      			<hr>

	      			<div>{{trans('messages.PCONTACT_h_social')}}</div>
	      			<ul class="social-list list-inline">
	              <li><a href="https://www.facebook.com/ukumbitv/" target="_blank" class="icon icon-facebook"></a></li>
	              <li><a href="https://twitter.com/ukumbi_tv" target="_blank" class="icon icon-twitter"></a></li>
	              <li><a href="https://www.instagram.com/ukumbitv" target="_blank" class="icon icon-instagram"></a></li>
	            </ul>

	        	</div><!-- col1 -->

	        	<div class="col-md-5 col-md-offset-1" ng-app="validationApp" ng-controller="mainController">
							@if(isset($flash_success))
								<div class="alert alert-success">
									{{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
									{{$flash_success}} 
								</div>
							@endif
	        		<form name="contactForm" action="{{route('user.send-contact-form')}}" method="POST" autocomplete="off" novalidate>
	              <div class="form-group select-wrap">
					        <label for="category">{{trans('messages.PCONTACT_form_help_label')}} <span>*</span></label>
	                <select id="q-category" class="form-control" name="category">
	                  <option selected>{{trans('messages.PCONTACT_form_help_sugg1')}}</option>
	                  <option>{{trans('messages.PCONTACT_form_help_sugg2')}}</option>
	                  <option>{{trans('messages.PCONTACT_form_help_sugg3')}}</option>
	                  <option>{{trans('messages.PCONTACT_form_help_sugg4')}}</option>
	                  <option>{{trans('messages.PCONTACT_form_help_sugg5')}}</option>
	                </select>
	              </div>
 
 

								<!-- Email Address -->
					      <div class="form-group" ng-class="{ 'has-error' : contactForm.email.$invalid && !contactForm.email.$pristine }">
					        <label for="email">{{trans('messages.auth_enter_email')}} <span>*</span></label>
					        <input id="user-email" class="form-control" type="email" name="email" ng-model="user.email" required>
					        <div ng-cloak ng-show="contactForm.email.$invalid && !contactForm.email.$pristine" class="help-block">{{trans('messages.auth_error_email')}}</div> 
					      </div>
 
 

								<div class="form-group" ng-class="{ 'has-error' : contactForm.message.$invalid && !contactForm.message.$pristine }">
					        <label for="message">{{trans('messages.PCONTACT_form_comment_label')}} <span>*</span></label>
	                <textarea class="form-control" name="message" id="message-text"  ng-model="user.message" placeholder="Type your message here" ng-minlength="8" ng-required="true"></textarea>
					        <div ng-cloak ng-show="contactForm.message.$error.minlength" class="help-block">{{trans('messages.PCONTACT_form_comment_error')}}</div> 
	              </div>
					      <button id="btn-submit-contact" data-contact-route="{{route('user.send-contact-form')}}" class="btn btn-block btn-cta1b btn-lg" ng-disabled="contactForm.$invalid">{{trans('messages.submit')}}</button>  
					      
	            </form>
	        	</div><!-- col2 -->
	        </div><!-- row -->	
			  </div>
			</div><!-- row --> 
    </div>
  </div>
@endsection
