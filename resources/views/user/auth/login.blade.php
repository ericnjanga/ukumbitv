@extends('layouts.user.focused')

@section('content')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-login
@endsection


<div class="main-content">
  <div class="rectangle frosting-glass">

    @include('notification.notify')
 
    <h3 class="page-title text-center">{{trans('messages.login_form_title')}}</h3>
    
    {!! csrf_field() !!}

    @if($errors->has('email') || $errors->has('password'))
      <div data-abide-error="" class="alert callout">
          <p>
              <i class="fa fa-exclamation-triangle"></i> 
              <strong> 
                  @if($errors->has('email')) 
                      {{ $errors->first('email') }}
                  @else 
                      $errors->first('password')
                  @endif
              </strong>
          </p>
      </div>
    @endif

    <form role="form" method="POST" action="{{ url('/login') }}">

    	{{-- [email] for group --}}
      <div class="form-group">
          <!-- <label for="email">{{trans('messages.email')}}</label> -->
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{trans('messages.email')}}">
      </div>


    	{{-- [password] for group --}}
      <div class="form-group">
        <!-- <label for="password">{{trans('messages.password')}}</label> -->
        <input type="password" name="password" class="form-control" id="password" placeholder="{{trans('messages.password')}}">

        <span class="form-error">
            @if ($errors->has('password'))
                <strong>{{ $errors->first('password') }}</strong>
            @endif
        </span> 
      </div>


    	{{-- [Stay logged in] for group --}}
			<div class="form-group form-group-spacearound1">
				<div class="checkbox">
			   	<input type="checkbox" id="cb-stay-connected"> 
			    <label for="cb-stay-connected">{{trans('messages.Stay_logged_in')}}</label>
			  </div>
			</div>


    	{{-- [Submit button] --}}
      <button type="submit" class="btn btn-submit btn-block">{{trans('messages.submit')}}</button> 


    	{{-- [Forgot password/Register] --}}
			<footer class="text-center"> 
				<div class="fb-login">
					@if(config('services.facebook.client_id') && config('services.facebook.client_secret'))
	          <form class="social-form form-horizontal" role="form" method="POST" action="{{ route('SocialLogin') }}">
	              <input type="hidden" value="facebook" name="provider" id="provider">
	              <a href="#">
	                <button type="submit" class="btn-link">
	                  <i class="fa fa-facebook-official" aria-hidden="true"></i>
	                  {{trans('messages.login_via_fb')}}
	                </button>
	              </a>
	          </form>
			    @endif 
        </div> 

      	<p>{{trans('messages.forgot_password')}}? <a href="{{ url('/password/reset') }}">{{trans('messages.Recover')}}</a></p>
      	<p>{{trans('messages.no_account')}}? <a href="{{route('user.register.form')}}">{{trans('messages.sign_up_now')}}</a></p>
			</footer>   

      <input type="hidden" name="timezone" value="" id="userTimezone">       
    </form>
    

  </div><!-- rectangle -->    
</div><!-- main-content -->


@endsection

@section('scripts')
  <script src="{{asset('streamtube/js/app.unauth.decor.js')}}"></script>
@endsection
