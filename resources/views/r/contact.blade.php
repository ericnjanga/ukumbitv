@extends('r.layouts.simple')
@section('content')
  <div class="page-tersm-and-privacy pace-contact">
    <div class="container">

			<div class="row">
			  <aside id="fixed-info" class="col-md-3 fixed-info">
			  	<ul class="list-unstyled">
			  		<!-- <li><a href="{{route('user.terms-condition')}}">{{trans('messages.tos_title')}}</a></li>
			  		<li><a href="{{route('user.privacy_policy')}}">{{trans('messages.PP_title')}}</a></li> -->

			  		<li><a href="#">{{trans('messages.tos_title')}}</a></li>
			  		<li><a href="#">{{trans('messages.PP_title')}}</a></li>
			  		<li class="active">{{trans('messages.contact')}}</li>
			  	</ul> 
			  </aside>

			  <div class="col-md-9">
	        <header>
	        	<h1>{{trans('messages.contact')}}</h1>
	        </header>
	        <div class="row">
	        	<div class="col-md-5 contact-text">
	        		<p>Fill free to ask questions</p>
	        		<p>We will do our best respond or contact you back within the next 24 hours:</p>

	      			<hr>

	        		<ul class="list-unstyled link-yellow-green-hover">
	        			<li>
	        				<span class="icon icon-envelope"></span>
	        				<a href="mailto:info@gmail.com">info@gmail.com</a>
	        			</li>
	        			<li>
	        				<span class="icon icon-phone-receiver"></span>
	        				<span>+1 647-704-7219</span>
	        			</li>
	        		</ul>

	      			<hr>

	      			<div>We are in social</div>
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
									{{$flash_success}} aaaa
								</div>
							@endif
	        		<form name="contactForm" action="{{route('user.send-contact-form')}}" method="POST" autocomplete="off" novalidate>
	              <div class="form-group select-wrap">
					        <label for="category">How can we help? <span>*</span></label>
	                <select id="q-category" class="form-control" name="category">
	                  <option selected>Just want to leave a comment</option>
	                  <option>I'm having an issue</option>
	                  <option>I'm having a complaint</option>
	                  <option>Just want to leave a suggestion</option>
	                  <option>Other</option>
	                </select>
	              </div>



								<!-- <div class="form-group">
					        <label>Enter your e-mail <span>*</span></label>
					        <input id="user-email" type="email" name="email" class="form-control" required>
					      </div> -->

 

								<!-- Email Address -->
					      <!-- <div class="form-group" ng-class="{ 'has-error' : contactForm.email.$invalid && !contactForm.email.$pristine }">
					        <label for="email">{{trans('messages.auth_enter_email')}} <span>*</span></label>
					        <input id="user-email" class="form-control" type="email" name="email" ng-model="user.email" required>
					        <div ng-cloak ng-show="contactForm.email.$invalid && !contactForm.email.$pristine" class="help-block">Enter a valid email.</div> 
					      </div> -->


	              <div class="form-group" ng-class="{ 'has-error' : contactForm.message.$invalid && !contactForm.message.$pristine }">
					        <label for="message">Enter your message <span>*</span></label>
	                <textarea class="form-control" name="message" id="message-text"  ng-model="user.message" placeholder="Type your message here" ng-minlength="8" ng-required="true"></textarea>
					        <div ng-cloak ng-show="contactForm.message.$error.minlength" class="help-block">Enter a valid email.</div> 
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
