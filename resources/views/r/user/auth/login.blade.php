@extends('r.layouts.simple')
@section('content')


<div class="signin-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="sign-block">
                    <div class="title-page">Sign In</div>
                    <div class="text-add">The easiest way for you to sign in is with Facebook</div>
                    <a href="" class="butn butn-large butn-dblue butn-face"><span class="icon icon-facebook"></span>Sign in with Facebook</a>
                    <div class="or-line upper">or</div>
                    <form action="{{route('user.login.post')}}" method="POST">
                        <div class="input-wrap">
                            <label>Enter your e-mail <span>*</span></label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="input-wrap">
                            <label>Password<span>*</span></label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="operations-pass">
                            <div class="input-wrap checkbox-wrap">
                                <input id="remember" type="checkbox">
                                <label for="remember">Remember me</label>
                            </div>
                            <a href="{{url('/password/reset')}}">Forgot password</a>
                        </div>
                        <button type="submit" class="butn butn-orange butn-large">Sign In</button>
                    </form>
                    <div class="have-block">
                        <span>Don’t have an account?</span>
                        <a href="{{route('user.register.form')}}" class="sign-butn">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection