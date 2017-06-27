@extends('layouts.user.focused')

@section('content')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-register
@endsection

<div class="main-content">
  <div class="rectangle panel-register frosting-glass"> 
    <h3 class="page-title text-center">{{trans('messages.signup')}}</h3>
 
    <form class="signup-form" role="form" method="POST" action="{{ url('/register') }}">

        {!! csrf_field() !!}

        @if($errors->has('email') || $errors->has('name') || $errors->has('password_confirmation') ||$errors->has('password'))
            <div data-abide-error="" class="alert callout">
                <p>
                    <i class="fa fa-exclamation-triangle"></i> 
                    <strong> 
                        @if($errors->has('email')) 
                            {{ $errors->first('email') }}
                        @endif

                        @if($errors->has('name')) 
                            {{ $errors->first('name') }}
                        @endif

                        @if($errors->has('password')) 
                            {{$errors->first('password')}}
                        @endif

                        @if($errors->has('password_confirmation'))
                            {{ $errors->has('password_confirmation') }}
                        @endif

                    </strong>
                </p>
            </div>
        @endif

        <div class="form-group">
          <!-- <label for="name">{{trans('messages.name')}}</label> -->
          <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="{{trans('messages.name')}}">
        </div>

        <div class="form-group">
          <!-- <label for="email">{{trans('messages.email')}}</label> -->
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{trans('messages.email')}}">
        </div>

        <div class="form-group">
          <!-- <label for="password">{{trans('messages.password')}}</label> -->
          <input type="password" name="password" class="form-control" id="password" placeholder="{{trans('messages.password')}}">
        </div>

        <div class="form-group">
          <!-- <label for="confirm_password">{{trans('messages.confirm_password')}}</label> -->
          <input type="password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="{{trans('messages.confirm_password')}}">
        </div>

        <button type="submit" class="btn btn-primary btn-block">{{trans('messages.join_for_free_month')}}</button>

      	<!-- [Additional links] -->
				<footer class="text-center">
					<p>{{trans('messages.already_account')}} <a href="{{route('user.login.form')}}">{{trans('messages.login')}}</a></p> 
				</footer> 

        <input type="hidden" name="timezone" value="" id="userTimezone">   
    </form>  
  </div><!--end of common-form-->  



  <div class="rectangle panel-offers frosting-glass">
  	<h3 class="page-title">
  		{{trans('messages.you_get_per_month')}}:
  	</h3>
  	<ul class="list-unstyled">
  		<li class="text-uppercase">
  			[icon] Offer text
  		</li>
  		<li class="text-uppercase">
  			[icon] Offer text
  		</li>
  		<li class="text-uppercase">
  			[icon] Offer text
  		</li>
  		<li class="text-uppercase">
  			[icon] Offer text
  		</li>
  		<li class="text-uppercase">
  			[icon] Offer text
  		</li>
  	</ul>

  	<h3 class="cta-title txt-color-primary">{{trans('messages.first_month_free')}}!</h3>
  </div>   
</div><!--form-background end-->

@endsection

@section('scripts')
  <script src="{{asset('streamtube/js/app.unauth.decor.js')}}"></script>
@endsection