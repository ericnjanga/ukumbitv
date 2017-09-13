@extends('r.layouts.simple')
@section('content')

 
  <div class="page-auth" ng-app="validationApp" ng-controller="mainController">
    <div class="text-center">
    	<h1>{{trans('messages.auth_signin')}}</h1>
      <p>{{trans('messages.auth_signin_blurb')}}</p>
      <a href="" class="btn btn-block btn-lg butn-dblue butn-face"><span class="icon icon-facebook"></span>{{trans('messages.auth_signin_fb')}}</a>
    </div>


    <div class="or-line upper">{{trans('messages.auth_or')}}</div>


    <form action="{{route('user.login.post')}}" method="POST" autocomplete="off" novalidate>


 


        <div class="form-group" ng-class="{ 'has-error' : userForm.email.$invalid && !userForm.email.$pristine }">
          <label for="email">{{trans('messages.auth_enter_email')}} <span>*</span></label>
          <input class="form-control" type="email" name="email" ng-model="user.email" required>
          <p ng-show="userForm.email.$invalid && !userForm.email.$pristine" class="help-block">Enter a valid email.</p>
        </div>




        <div class="form-group">
          <label for="password">{{trans('messages.auth_password')}} <span>*</span></label>
          <input class="form-control" type="password" name="password" required>
        </div>
        <div class="checkbox">
        	<label for="remember">
        		<input id="remember" type="checkbox"> {{trans('messages.auth_remember')}}
        	</label>
          <div class="block-forgot-pass fine-print">
          	<a href="{{url('/password/reset')}}">{{trans('messages.auth_forgot_password')}}</a>
          </div> 
        </div>
        <button type="submit" class="btn btn-block btn-cta1b btn-lg">{{trans('messages.auth_signin')}}</button>
    </form>

    <div>
        <span>{{trans('messages.auth_no_account')}}</span>
        <a href="{{route('user.register.form')}}" class="sign-butn">{{trans('messages.auth_signup')}}</a>
    </div>
  </div>
 
@endsection