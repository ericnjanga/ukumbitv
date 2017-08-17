@extends('layouts.admin.focused')

@section('title', 'Login')

@section('content')

    <div class="">


        <form class="form-layout" role="form" method="POST" action="{{ url('/admin/login') }}">
            {{ csrf_field() }}

            <div class="login-logo">
               <!-- <a href="{{route('admin.login')}}"><b>{{Setting::get('site_name')}}</b></a> -->
               <input type="hidden" name="timezone" value="" id="userTimezone">
            </div>

            <p class="text-center mb30"></p>

            <div class="row">
              <div class="col-md-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                  <input type="email" class="form-control input-lg" name="email" placeholder="Your Username">

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif 
              </div>


              <div class="col-md-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                  <input type="password" class="form-control input-lg" name="password" placeholder="Your Password">

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif 
              </div>


	            <div class="col-md-6 col-md-offset-6" style="margin-bottom: 10px;">
                <button class="btn btn-submit btn-block" type="submit">
                  Continue
                </button>
	            </div>  
	            <div class="col-md-6 col-md-offset-6 form-group text-center">
	              <a class="link-reset" href="{{ url('/admin/password/reset') }}">Forgot password?</a>
	            </div>
            </div><!-- row -->


            

        </form>

    </div>

@endsection

@section('scripts')

<script src="{{asset('assets/js/jstz.min.js')}}"></script>
<script>
    
    $(document).ready(function() {

        var dMin = new Date().getTimezoneOffset();
        var dtz = -(dMin/60);
        // alert(dtz);
        $("#userTimezone").val(jstz.determine().name());
    });

</script>

@endsection

