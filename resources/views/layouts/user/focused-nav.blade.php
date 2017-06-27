
<div class="main-nav">
	<div class="container">
		<div class="col-md-12">
	    <div class="brand pull-left">
	      <a href="{{route('user.dashboard')}}" alt="UKUMBITV" class="y-image">
	      	<img src="{{asset('streamtube/images/logo1.png')}}" alt='UkumbiTv' />
	      </a>
	    </div><!--test end-->

	    <div class="main-nav__additional-links pull-right">

			@if(App::isLocale('fr'))
	      		<a href="{{url('setlocale/en')}}">English</a>
			@else
	      		<a href="{{url('setlocale/fr')}}">Français</a>
			@endif

	    	<!-- @if(Auth::check())
	    		<a href="{{route('user.profile')}}" class="y-signin">{{tr('back_profile')}}</a>
	    	@else
	    		<a href="{{route('user.register.form')}}" class="y-signin">{{tr('signup')}}</a>
	            <a href="{{route('user.login.form')}}" class="y-signin">{{tr('login')}}</a>
	    	@endif  -->
	    </div> 
	  </div>
	</div> 
</div>