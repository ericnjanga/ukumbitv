@extends('layouts.user.focused')

@section('content')

<div class="frame-login">
  <div class="auth-rectangle">

     @include('notification.notify')
    
    <h3 class="page-title text-center">Login</h3>


    <div class="sign-up login-page">
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
            <!-- <label for="email">{{tr('email')}}</label> -->
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{tr('email')}}">
        </div>


      	{{-- [password] for group --}}
        <div class="form-group">
          <!-- <label for="password">{{tr('password')}}</label> -->
          <input type="password" name="password" class="form-control" id="password" placeholder="{{tr('password')}}">

          <span class="form-error">
              @if ($errors->has('password'))
                  <strong>{{ $errors->first('password') }}</strong>
              @endif
          </span> 
        </div>


      	{{-- [Stay logged in] for group --}}
				<div class="form-group">
					<div class="checkbox">
				    <label>
				      <input type="checkbox"> Stay logged in
				    </label>
				  </div>
				</div>


      	{{-- [Submit button] --}}
        <button type="submit" class="btn btn-submit">{{tr('submit')}}</button> 


      	{{-- [Forgot password/Register] --}}
				<div class="text-center"> 
        	<p>{{tr('forgot_password')}}? <a href="{{ url('/password/reset') }}">{{tr('Recover')}}</a></p>
        	<p>{{tr('no_account')}}? <a href="{{route('user.register.form')}}">{{tr('sign_up_now')}}</a></p>
				</div>    

        <input type="hidden" name="timezone" value="" id="userTimezone">       
      </form>
    </div><!--end of sign-up-->





    <div class="social-btn">
        @if(config('services.facebook.client_id') && config('services.facebook.client_secret'))
            <div class="social-fb">
                <form class="social-form form-horizontal" role="form" method="POST" action="{{ route('SocialLogin') }}">
                    <input type="hidden" value="facebook" name="provider" id="provider">
                    <a href="#">
                        <button type="submit">
                            <i class="fa fa-facebook"></i>{{tr('login_via_fb')}}
                        </button>
                    </a>
                </form>
            </div> 
        @endif  
    </div><!--end of social-btn--> 

  </div><!--end of common-form-->     
</div><!--end of form-background-->

@endsection

@section('scripts')


    <script type="text/javascript" src="{{asset('streamtube/js/app.decoration.js')}}"></script>

@endsection
