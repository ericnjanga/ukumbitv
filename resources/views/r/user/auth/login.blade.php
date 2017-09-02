@extends('r.layouts.simple')
@section('content')

 
  <div class="page-auth">
      <div class="text-center">
      	<h1>{{trans('messages.auth_signin')}}</h1>
	      <div class="text-add">{{trans('messages.auth_signin_blurb')}}</div>
	      <a href="" class="butn btn-lg butn-dblue butn-face"><span class="icon icon-facebook"></span>{{trans('messages.auth_signin_fb')}}</a>
      </div>
      <div class="or-line upper">{{trans('messages.or')}}</div>
      <form action="{{route('user.login.post')}}" method="POST">
          <div class="input-wrap">
              <label>Enter your e-mail <span>*</span></label>
              <input type="email" name="email" required>
          </div>
          <div class="input-wrap">
              <label>Password <span>*</span></label>
              <input type="password" name="password" required>
          </div>
          <div class="operations-pass">
              <div class="input-wrap checkbox-wrap">
                  <input id="remember" type="checkbox">
                  <label for="remember">Remember me</label>
              </div>
              <a href="{{url('/password/reset')}}">Forgot password</a>
          </div>
          <button type="submit" class="butn btn-cta1b btn-lg">Sign In</button>
      </form>
      <div class="have-block">
          <span>Don’t have an account?</span>
          <a href="{{route('user.register.form')}}" class="sign-butn">Sign Up</a>
      </div>
  </div>
 
@endsection