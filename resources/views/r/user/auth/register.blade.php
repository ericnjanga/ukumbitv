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
      <p class="fine-print">{{trans('messages.auth_policy_check1')}} <a href="{{route('user.terms-condition')}}">{{trans('messages.tos_title')}}</a> <span>{{trans('messages.and')}}</span> <a href="{{route('user.privacy_policy')}}">{{trans('messages.PP_title')}}</a></p> 
      <button type="submit" class="btn btn-block btn-cta1b btn-lg">{{trans('messages.auth_signup')}}</button>
    </form>
    
    <div>
      <span>{{trans('messages.auth_have_account')}}</span>
      <a href="{{route('user.login.form')}}" class="sign-butn">{{trans('messages.auth_signin')}}</a>
    </div>
 
  </div>
@endsection