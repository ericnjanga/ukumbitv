@extends('r.layouts.simple')
@section('content')

 
  <div class="page-auth" ng-app="validationApp" ng-controller="mainController">
    <h1 class="text-center">Reset password</h1>

    <p>We will send new password on your e-mail</p>
    <form name="recoverForm" action="" method="">


      <div class="form-group" ng-class="{ 'has-error' : recoverForm.email.$invalid && !recoverForm.email.$pristine }">
        <label for="email">{{trans('messages.auth_enter_email')}} <span>*</span></label>
        <input class="form-control" type="email" name="email" ng-model="user.email" required>
        <div ng-cloak ng-show="recoverForm.email.$invalid && !recoverForm.email.$pristine" class="help-block">Enter a valid email.</div> 
      </div>
 
      <button type="submit" class="butn btn-cta1b btn-lg" ng-disabled="loginForm.$invalid">Reset password</button>
    </form>
	</div>


    
        
    
@endsection