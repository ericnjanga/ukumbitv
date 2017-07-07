@extends('layouts.user.focused')

@section('content')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-register
@endsection

<div class="main-content">
  <div class="rectangle panel-register frosting-glass"> 
    <h3 class="page-title text-center">{{trans('messages.signup')}}</h3>

 
		<div class="fb-login text-center">
			@if(config('services.facebook.client_id') && config('services.facebook.client_secret'))
        <form class="social-form form-horizontal" role="form" method="POST" action="{{ route('SocialLogin') }}">
          <input type="hidden" value="facebook" name="provider" id="provider"> 
          <button type="submit" class="btn-link" style="font-size: 20px;">
            <i class="fa fa-facebook-official" aria-hidden="true"></i>
            {{trans('messages.register_via_fb')}}
          </button> 

          <p style="opacity:0.8; margin-top:10px;"><small><i>{{trans('messages.Skip_registration_process')}}</i></small></p>
        </form>
	    @endif 
    </div> 





 
    <form class="signup-form" role="form" method="POST" action="{{ url('/register') }}">
 

      <div>
      	<hr style="margin:40px;">
      	<h4 class="text-center" style="margin-bottom: 30px;">{{trans('messages.register_via_email')}}</h4>
      </div>
 

        {!! csrf_field() !!}
				
	    	@if($errors->has('name'))
	      <div class="alert callout mb0 color-danger"> 
	        <i class="fa fa-exclamation-triangle"></i> 
	        <strong>{{ $errors->first('name') }}</strong> 
	      </div>
	      @endif 
        <div class="form-group">
          <!-- <label for="name">{{trans('messages.name')}}</label> -->
          <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="{{trans('messages.name')}}">
        </div>



				
	    	@if($errors->has('email'))
	      <div class="alert callout mb0 color-danger"> 
	        <i class="fa fa-exclamation-triangle"></i> 
	        <strong>{{ $errors->first('email') }}</strong> 
	      </div>
	      @endif 
        <div class="form-group">
          <!-- <label for="email">{{trans('messages.email')}}</label> -->
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{trans('messages.email')}}">
        </div>



				
	    	@if($errors->has('password'))
	      <div class="alert callout mb0 color-danger"> 
	        <i class="fa fa-exclamation-triangle"></i> 
	        <strong>{{ $errors->first('password') }}</strong> 
	      </div>
	      @endif 
        <div class="form-group">
          <!-- <label for="password">{{trans('messages.password')}}</label> -->
          <input type="password" name="password" class="form-control" id="password" placeholder="{{trans('messages.password')}}">
        </div>




				
	    	@if($errors->has('password_confirmation'))
	      <div class="alert callout mb0 color-danger"> 
	        <i class="fa fa-exclamation-triangle"></i> 
	        <strong>{{ $errors->first('password_confirmation') }}</strong> 
	      </div>
	      @endif 
        <div class="form-group">
          <!-- <label for="confirm_password">{{trans('messages.confirm_password')}}</label> -->
          <input type="password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="{{trans('messages.confirm_password')}}">
        </div>

        <button type="submit" class="btn btn-primary btn-block">{{trans('messages.join_for_free_week')}}</button>

      	<!-- [Additional links] -->
				<footer class="text-center">
					<p>{{trans('messages.already_account')}} <a href="{{route('user.login.form')}}" class="underlined">{{trans('messages.login2')}}</a></p> 
				</footer> 

        <input type="hidden" name="timezone" value="" id="userTimezone">   
    </form>  
  </div><!--end of common-form-->  



  <div class="rectangle panel-offers frosting-glass">
  	<h3 class="page-title text-center">
  		{{trans('messages.you_get_per_month')}}:
  	</h3>

	  @include('snippet.offers')

  	<h3 class="cta-title txt-color-primary text-center">{{trans('messages.first_week_free')}}!</h3>
  </div>   
</div><!--form-background end-->

@endsection

@section('scripts')
  <script src="{{asset('streamtube/js/app.unauth.decor.js')}}"></script>
@endsection