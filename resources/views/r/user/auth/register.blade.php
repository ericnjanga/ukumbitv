@extends('r.layouts.simple')
@section('content')
  <div class="page page-auth" ng-app="validationApp" ng-controller="mainController">  
    <div class="text-center">
    	<h1>{{trans('messages.auth_signup')}}</h1>
      <p>{{trans('messages.auth_signin_blurb')}}</p>
      <a href="" class="btn btn-block btn-lg butn-dblue butn-face"><span class="icon icon-facebook"></span>{{trans('messages.auth_signin_fb')}}</a>
    </div>


    <div class="or-line upper">{{trans('messages.auth_or')}}</div>


    <form name="registerForm" action="{{ url('/register') }}" method="POST" autocomplete="off" novalidate>
      @if($errors->has('email') || $errors->has('password_confirmation'))
        <div data-abide-error="" class="alert callout">
          <p>
            <i class="fa fa-exclamation-triangle"></i>
            <strong>
              @if($errors->has('email'))
                {{ $errors->first('email') }}
              @endif

              @if($errors->has('password_confirmation'))
                {{ $errors->has('password_confirmation') }}
              @endif

            </strong>
          </p>
        </div>
      @endif
 
 
			<!-- Email Address -->
      <div class="form-group" ng-class="{ 'has-error' : registerForm.email.$invalid && !registerForm.email.$pristine }">
        <label for="email">{{trans('messages.auth_enter_email')}} <span>*</span></label>
        <input class="form-control" type="email" name="email" ng-model="user.email" required>
        <div ng-cloak ng-show="registerForm.email.$invalid && !registerForm.email.$pristine" class="help-block">{{trans('messages.auth_error_email')}}</div> 
      </div>


      <!-- Password -->
      <div class="form-group" ng-class="{ 'has-error' : registerForm.password.$invalid && !registerForm.password.$pristine }">
        <label>{{trans('messages.auth_enter_password')}}</label>   
        <input type="password" name="password" class="form-control" ng-model="user.password" ng-minlength="6" required>
        <div ng-cloak ng-show="registerForm.password.$dirty && registerForm.password.$viewValue.length==0" class="help-block">{{trans('messages.auth_error_password1')}}</div> 
        <div ng-cloak ng-show="registerForm.password.$error.minlength" class="help-block">{{trans('messages.auth_error_password2')}}</div>
        <div ng-cloak ng-show="registerForm.password.$error.pattern" class="help-block">{{trans('messages.auth_error_password3')}}</div>
    	</div> 

 
      
      <!-- Password Confirmation -->
      <div class="form-group" ng-class="{ 'has-error' : (registerForm.password.$valid && registerForm.password_confirmation.$dirty &&registerForm.password_confirmation.$error.passwordMatch) }">
        <label>{{trans('messages.auth_retype_password')}}</label> 
      
				<input type="password" match-password="password" name="password_confirmation" ng-model="user.password_confirmation" class="form-control" required>
        <p ng-show="(registerForm.password.$valid && registerForm.password_confirmation.$dirty &&registerForm.password_confirmation.$error.passwordMatch)" class="help-block">{{trans('messages.auth_retypeerror_password')}}</p> 
      </div>
 

      <p class="fine-print">{{trans('messages.auth_policy_check1')}} <a href="{{route('user.terms-condition')}}">{{trans('messages.tos_title')}}</a> <span>{{trans('messages.and')}}</span> <a href="{{route('user.privacy_policy')}}">{{trans('messages.PP_title')}}</a></p> 

      <button type="submit" class="btn btn-block btn-cta1b btn-lg" ng-disabled="registerForm.$invalid">{{trans('messages.auth_signup')}}</button>
    </form>



    
    <div>
      <span>{{trans('messages.auth_have_account')}}</span>
      <a href="{{route('user.login.form')}}" class="sign-butn">{{trans('messages.auth_signin')}}</a>
    </div>
 
  </div>
@endsection