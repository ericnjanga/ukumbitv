<footer class="main-footer">
	<div class="container">
	  <div class="row">
	  	<div class="col-md-12 text-center">
	  		

				{{-- ONLY FOR LOGGED IN USERS --}}
	  		@if (Auth::check())
				<ul class="list-inline">
	  			<li>
	  				<a href="{{url('/about-us')}}" class="underlined">{{trans('messages.about_us')}}</a>
	  			</li> 
	  			<li>
	  				<a href="{{url('/terms-of-use')}}" class="underlined">{{trans('messages.terms_of_use')}}</a>
	  			</li>
	  			<li>
	  				<a href="{{url('/privacy-statement')}}" class="underlined">{{trans('messages.privacy_statement')}}</a>
	  			</li> 
	  			<li>
	  				<a href="{{url('/jobs')}}" class="underlined">{{trans('messages.jobs')}}</a>
	  			</li> 
	  		</ul>
				@endif
				{{-- ONLY FOR LOGGED IN USERS --}}








	  		<ul class="list-inline"> 
	  			<li>
	  				{{trans('messages.question_contactus')}}: <a href="mailto:info@ukumbitv.com" class="underlined">info@ukumbitv.com</a>
	  			</li>
	  		</ul> 
	  		<ul class="list-inline"> 
	  			<li>
	  				{{trans('messages.translate_website_in')}} :
	  				@if(App::isLocale('fr'))
				      <a class="underlined" href="{{url('setlocale/en')}}">English</a>
						@else
				      <a class="underlined" href="{{url('setlocale/fr')}}">Français</a>
						@endif
	  			</li>
	  		</ul> 



	  		



	  	</div>

	  	<div class="col-md-12 text-center">
	  		<p>{{trans('messages.Copyright')}} 2017, Toronto, Canada</p> 
	  	</div>
	  </div>
	</div>  
</footer>