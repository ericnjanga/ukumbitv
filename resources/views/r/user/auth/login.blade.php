@extends('r.layouts.simple')


{{-- Assign "page-login" class to body --}}
@section('body-class')
page-authentication page-login
@endsection


@section('content')

 
  <div class="page page-auth" ng-app="validationApp" ng-controller="mainController" style="border:2px solid red;">
    @if(config('services.facebook.client_id') && config('services.facebook.client_secret'))
    <div class="text-center">
    	<h1>{{trans('messages.auth_signin')}}</h1>
      <p>{{trans('messages.auth_signin_blurb')}}</p>
      <form class="social-form form-horizontal" role="form" method="POST" action="{{ route('SocialLogin') }}">
        <input type="hidden" value="facebook" name="provider" id="provider">
        {{--<a href="{{ route('SocialLogin') }}" class="btn btn-block btn-lg butn-dblue butn-face"><span class="icon icon-facebook"></span>{{trans('messages.auth_signin_fb')}}</a>--}}
        <button type="submit" class="btn btn-block btn-lg butn-dblue butn-face"><span class="icon icon-facebook"></span>{{trans('messages.auth_signin_fb')}}</button>
      </form>
    </div>
    @endif


    <div class="or-line upper">{{trans('messages.auth_or')}}</div>
		


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
    </form>

    <div>
        <span>{{trans('messages.auth_no_account')}}</span>
        <a href="{{route('user.register.form')}}" class="sign-butn">{{trans('messages.auth_signup')}}</a>
    </div>
  </div>
 
@endsection