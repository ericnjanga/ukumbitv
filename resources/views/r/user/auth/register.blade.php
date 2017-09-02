@extends('r.layouts.simple')
@section('content')
  <div class="page-auth">   
    <div class="text-center">
    	<h1>{{trans('messages.auth_signin')}}</h1>
      <p>{{trans('messages.auth_signin_blurb')}}</p>
      <a href="" class="btn btn-block btn-lg butn-dblue butn-face"><span class="icon icon-facebook"></span>{{trans('messages.auth_signin_fb')}}</a>
    </div>


    <div class="or-line upper">{{trans('messages.auth_or')}}</div>


    <form  action="{{ url('/register') }}" method="POST">
        <div class="form-group">
          <label>Enter your e-mail <span>*</span></label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Password <span>*</span></label>
          <input type="password" name="password" class="form-control" required>
        </div> 
        <div class="terms-policy">
            <p>By clicking Sign Up, I agree to the</p>
            <div>
                <a href="{{route('user.terms-condition')}}">Terms of Service</a>
                <span>and</span>
                <a href="{{route('user.privacy_policy')}}">Privacy policy</a>
            </div>
        </div>
        <button type="submit" class="butn btn-cta1b btn-lg">Sign Up</button>
    </form>
    
    <div>
        <span>{{trans('messages.auth_have_account')}}</span>
        <a href="{{route('user.login.form')}}" class="sign-butn">{{trans('messages.auth_signin')}}</a>
    </div>
 
  </div>
@endsection