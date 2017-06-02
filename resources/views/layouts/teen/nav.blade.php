<div class="top-fix">

	<style>
		.lan-active {

			background:#cb0000 !important;

		}
	</style>
            
    <div class="row top-nav">

    	@if(Auth::check())

			<div class="container nav-pad"> 

				<div class="btn-group">

					<div class="btn-group">

						<div class="dropdown">

						  	<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
								<i class="fa fa-globe"></i>
								<span class="caret"></span>
							</button>

						  	@if(Setting::get('admin_language_control') == 0)

						  	 	@if(count($languages = getActiveLanguages()) > 1)

							  	 	<ul class="dropdown-menu dropdown-menu-left">

							  	  		@foreach(getActiveLanguages() as $h => $language)
								  	
											<li class="{{(\Session::get('locale') == $language->folder_name) ? 'lan-active' : ''}}">
												
												<a href="{{route('user_session_language', $language->folder_name)}}">{{$language->folder_name}}</a>

											</li>

								  		@endforeach

								  	</ul>

						  		@endif

					  		@endif

						</div> 

					</div>
					
					<div class="btn-group">

						<div class="dropdown">

						  	<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" style="margin-left: 20px">
						   		@if(Auth::check()) {{Auth::user()->name}} @else {{tr('user')}} @endif 
						   		<span class="caret"></span>
						  	</button>

						  	<ul class="dropdown-menu dropdown-menu-right">

								<li><a href="{{route('user.profile')}}"><b><i class="fa fa-user" style="color: red"></i></b> {{tr('profile')}}</a></li>

								<li><a href="{{route('user.wishlist')}}"><b><i class="fa fa-heart" style="color: red"></i></b> {{tr('wishlist')}}</a></li> 

								@if(Setting::get('is_spam'))  
									
									<li><a href="{{route('user.spam-videos')}}"><b><i class="fa fa-exclamation-triangle" style="color: red"></i></b> {{tr('spam_videos')}}</a></li>  

								@endif

								@if(Setting::get('is_payper_view')) 

									<li><a href="{{route('user.pay-per-videos')}}"><b><i class="fa fa-money" style="color: red"></i></b> {{tr('pay_per_videos')}}</a></li>  

								@endif

								@if (Auth::user()->login_by == 'manual') 
									<li role="separator" class="divider"></li>

									<li><a href="{{route('user.change.password')}}"><b><i class="fa fa-key" style="color: red"></i></b>  {{tr('change_password')}}</a></li>     
								@endif
								<li>
									<a href="{{route('user.delete.account')}}" @if(Auth::user()->login_by != 'manual') onclick="return confirm('Are you sure? . Once you deleted account, you will lose your history and wishlist details.')" @endif>
								        <i class="fa fa-trash" style="color: red"></i> {{tr('delete_account')}}
								    </a>

								</li>  

								<li><a href="{{route('user.logout')}}"><b><i class="fa fa-sign-out" style="color: red"></i></b>   {{tr('logout')}}</a></li>                
						  	
						  	</ul>

						</div>
					
					</div>

				</div>

			</div>

        @else 

      	<div class="container nav-pad">

			<div class="dropdown">
				
				<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
					<i class="fa fa-globe"></i>
					<span class="caret"></span>
				</button>

	      		@if(Setting::get('admin_language_control') == 0)

			  	 	@if(count($languages = getActiveLanguages()) > 1)

				  	 	<ul class="dropdown-menu dropdown-menu-right">

				  	  		@foreach(getActiveLanguages() as $h => $language)
					  	
								<li class="{{(\Session::get('locale') == $language->folder_name) ? 'lan-active' : ''}}">
									
									<a href="{{route('user_session_language', $language->folder_name)}}">{{$language->folder_name}}</a>

								</li>

					  		@endforeach

					  	</ul>

			  		@endif

			  	@endif

		        <a href="{{ route('user.login.form') }}">{{tr('login')}}</a>  
		        <a href="{{route('user.register.form')}}">{{tr('register')}}</a> 

	        </div>

      	</div>

      	@endif
    
    </div>

    <div class="row main-nav">

      	<nav class="navbar navbar-default" role="navigation">

	        <div class="container nav-pad">
	          	<!-- Brand and toggle get grouped for better mobile display -->
	          	<div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		              <span class="sr-only">Toggle navigation</span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="{{route('user.dashboard')}}">
		            	
		            	@if(Setting::get('site_logo'))
			            	<img src="{{Setting::get('site_logo' , asset('logo.png'))}}">
			            @else
			            	<img src="{{asset('logo.png')}}">
			            @endif

		            </a>
	          	</div>

	          	<!-- Collect the nav links, forms, and other content for toggling -->
	          	
	          	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		            <ul class="nav navbar-nav navbar-left">
		              	<li id="home"><a href="{{route('user.dashboard')}}">{{tr('videos')}}</a></li>
		              	<li id="categories"><a href="{{route('user.categories')}}">{{tr('categories')}}</a></li>
		              	<li id="trending"><a href="{{route('user.trending')}}">{{tr('trending')}}</a></li>
		              	@if(Auth::check())
		              	<li id="profile"><a href="{{route('user.wishlist')}}">{{tr('wishlist')}}</a></li>
		              	@endif
		              
		            </ul>

		            <form class="navbar-form navbar-right" role="search" id="userSearch" action="{{route('search-all')}}">
		              	<div class="form-group">
		                	<input type="search" required id="auto_complete_search" class="form-control" name="key" placeholder="{{tr('search')}}">
		              	</div>

		              	<button type="submit" class="btn btn-default">
		              		<i class="glyphicon glyphicon-search"></i>
						</button>
		            
		            </form>
	            
	          	</div>

	          	<!-- /.navbar-collapse -->

	        </div>

	        <!-- /.container-fluid -->
      	</nav>
    </div>

</div>


