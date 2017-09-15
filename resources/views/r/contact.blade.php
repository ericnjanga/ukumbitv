@extends('r.layouts.simple')
@section('content')
  <div class="page-tersm-and-privacy">
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
	        <h1>{{trans('messages.contact')}}</h1>
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

	        	<div class="col-md-5 col-md-offset-1">
					@if(isset($flash_success))
						<div class="alert alert-success"  >
							{{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
							{{$flash_success}} aaaa
						</div>
					@endif
	        		{{--<form action="{{route('user.send-contact-form')}}" method="POST">--}}
	              <div class="form-group select-wrap">
	                <select id="q-category" class="form-control" name="category">
	                  <option selected>Select a subject</option>
	                  <option>Leave a comment</option>
	                  <option>Leave a Suggestion</option>
	                  <option>Having an issue</option>
	                  <option>Having a complaint</option>
	                  <option>Other</option>
	                </select>
	              </div>
								<div class="form-group">
					        <label>Enter your e-mail <span>*</span></label>
					        <input id="user-email" type="email" name="email" class="form-control" required>
					      </div>
	              <div class="form-group">
					        <label>Enter your message <span>*</span></label>
	                <textarea class="form-control" name="message" id="message-text" placeholder="Type your message here"></textarea>
	              </div>
					      <button id="btn-submit-contact" data-contact-route="{{route('user.send-contact-form')}}" class="btn btn-block btn-cta1b btn-lg">{{trans('messages.submit')}}</button>
	 
	            {{--</form>--}}
	        	</div><!-- col2 -->
	        </div><!-- row -->	
			  </div>
			</div><!-- row --> 
    </div>
  </div>
@endsection
