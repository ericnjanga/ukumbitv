@extends('r.layouts.simple')
@section('content')

 
  <div class="page-auth">
      <div class="text-center">
      	<h1>{{trans('messages.auth_signin')}}</h1>
	      <div class="text-add">{{trans('messages.auth_signin_blurb')}}</div>
	      <a href="" class="btn btn-block btn-lg butn-dblue butn-face"><span class="icon icon-facebook"></span>{{trans('messages.auth_signin_fb')}}</a>
      </div>
      <div class="or-line upper">{{trans('messages.or')}}</div>
      <form action="{{route('user.login.post')}}" method="POST">
          <div class="input-wrap">
              <label>{{trans('messages.auth_enter_email')}} <span>*</span></label>
              <input class="form-control" type="email" name="email" required>
          </div>
          <div class="input-wrap">
              <label>{{trans('messages.auth_password')}} <span>*</span></label>
              <input class="form-control" type="password" name="password" required>
          </div>
          <div class="operations-pass">
              <div class="input-wrap checkbox-wrap">
                  <input id="remember" type="checkbox">
                  <label for="remember">{{trans('messages.auth_remember')}}</label>
              </div>
              <a href="{{url('/password/reset')}}">{{trans('messages.auth_forgot_password')}}</a>
          </div>
          <button type="submit" class="btn btn-block btn-cta1b btn-lg">{{trans('messages.auth_signin')}}</button>
      </form>
      <div class="have-block">
          <span>{{trans('messages.auth_no_account')}}</span>
          <a href="{{route('user.register.form')}}" class="sign-butn">Sign Up</a>
      </div>
  </div>
 
@endsection