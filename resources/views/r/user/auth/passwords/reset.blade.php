@extends('r.layouts.simple')
@section('content')
    <div class="page-auth" ng-app="validationApp" ng-controller="mainController">
        <div class="text-center">
            <h1>Password Reset</h1>
        </div>

        <form name="resetPasswordForm" action="{{ url('password/reset') }}" method="POST" autocomplete="off" novalidate>
            <input type="hidden" name="token" value="{{ $token }}">
            @if($errors->has('password') || $errors->has('password_confirmation'))
                <div data-abide-error="" class="alert callout">
                    <p>
                        <i class="fa fa-exclamation-triangle"></i>
                        <strong>
                            @if($errors->has('password'))
                                {{ $errors->first('password') }}
                            @endif

                            @if($errors->has('password_confirmation'))
                                {{ $errors->has('password_confirmation') }}
                            @endif

                        </strong>
                    </p>
                </div>
        @endif


        <!-- Email Address -->

            <h3>Email: {{ $email or old('email') }}</h3>

                <input class="form-control" type="hidden" name="email" required value="{{ $email or old('email') }}">



            <!-- Password -->
            <div class="form-group" ng-class="{ 'has-error' : registerForm.password.$invalid && !registerForm.password.$pristine }">
                <label>Password</label>
                <input type="password" name="password" class="form-control" ng-model="user.password" ng-minlength="6" required>
                <div ng-cloak ng-show="registerForm.password.$dirty && registerForm.password.$viewValue.length==0" class="help-block">You password is required.</div>
                <div ng-cloak ng-show="registerForm.password.$error.minlength" class="help-block">Password is too short.</div>
                <div ng-cloak ng-show="registerForm.password.$error.pattern" class="help-block">Your assword should contain at least 1 lowercase letter, 1 uppercase letter, 1 number, 1 special character.</div>
            </div>



            <!-- Password Confirmation -->
            <div class="form-group" ng-class="{ 'has-error' : (registerForm.password.$valid && registerForm.password_confirmation.$dirty &&registerForm.password_confirmation.$error.passwordMatch) }">
                <label>Re-Type New Password</label>

                <input type="password" match-password="password" name="password_confirmation" ng-model="user.password_confirmation" class="form-control" required>
                <p ng-show="(registerForm.password.$valid && registerForm.password_confirmation.$dirty &&registerForm.password_confirmation.$error.passwordMatch)" class="help-block">Password doesn't match.</p>
            </div>


            <button type="submit" class="btn btn-block btn-cta1b btn-lg" ng-disabled="registerForm.$invalid">Reset</button>
        </form>


    </div>
@endsection