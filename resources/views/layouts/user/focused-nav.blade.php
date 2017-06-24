<div class="row">
  <div class="col-md-12">
    <div class="brand">
      <a href="{{route('user.dashboard')}}" class="y-image">
      	UKUMBITV
          <!-- @if(Setting::get('site_logo'))
              <img src="{{Setting::get('site_logo')}}">
          @else
              <img src="{{asset('logo.png')}}">
          @endif -->
      </a>
    </div><!--test end-->

    <div> 
    	<!-- @if(Auth::check())
    		<a href="{{route('user.profile')}}" class="y-signin">{{tr('back_profile')}}</a>
    	@else
    		<a href="{{route('user.register.form')}}" class="y-signin">{{tr('signup')}}</a>
            <a href="{{route('user.login.form')}}" class="y-signin">{{tr('login')}}</a>
    	@endif  -->
    </div> 
  </div>
</div>