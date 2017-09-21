@extends('r.layouts.simple')
@section('content')

 
  <div class="page page-auth" ng-app="validationApp" ng-controller="mainController">
    @if(Session::has('status'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{Session::get('status')}}
      </div>
    @endif
    <h1 class="text-center">{{trans('messages.preset_h1')}}</h1>
   
    <p class="text-center">{{trans('messages.preset_wewill')}}</p>
    <form name="recoverForm" action="{{ url('/password/email') }}" method="POST">


      <div class="form-group" ng-class="{ 'has-error' : recoverForm.email.$invalid && !recoverForm.email.$pristine }">
        <label for="email">{{trans('messages.auth_enter_email')}} <span>*</span></label>
        <input class="form-control" type="email" name="email" ng-model="user.email" required>
        <div ng-cloak ng-show="recoverForm.email.$invalid && !recoverForm.email.$pristine" class="help-block">{{trans('messages.auth_error_email')}}</div> 
      </div>

      <button type="submit" class="btn btn-cta1b btn-block btn-lg" ng-disabled="recoverForm.$invalid">{{trans('messages.preset_h1')}}</button>
    </form>

    <div>
        <a href="{{route('user.login.form')}}" class="sign-butn">{{trans('messages.auth_signin')}}</a> | 
        <a href="{{route('user.register.form')}}" class="sign-butn">{{trans('messages.auth_signup')}}</a>
    </div>
	</div>


    
        
    
@endsection