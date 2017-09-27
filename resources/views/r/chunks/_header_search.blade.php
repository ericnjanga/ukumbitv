<!-- email confirmation reminder -->
@if(Auth::check())
@if(!Auth::user()->isVerified())
	<div class="alert__force-notice alert alert-info text-center" role="alert">
		{{trans('messages.auth_confirm_reminder1')}}
		<a href="{{route('user.confirm-user-email')}}"><b>{{trans('messages.auth_confirm_reminder2')}}</b></a> <i class="fa fa-smile-o" aria-hidden="true"></i>
	</div>
@endif
@endif
<!-- email confirmation reminder -->




<header class="ukb-main-header">
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">{{trans('messages.toggle_navigation')}}</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="ukb-navbar-brand navbar-brand" href="/"><img src="{{asset('r/img/logo.png')}}" alt="UkumbiTV" title="UkumbiTV" style="max-width:170px;"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
	    	<ul class="ukb-nav-videos nav navbar-nav">
	        <li id="movies">
						<a href="#"> 
							{{trans('messages.dramas')}}
						</a> 
					</li>
					<li id="animations">
						<a href="#"> 
							{{trans('messages.comedies')}}
						</a> 
					</li>  
	      </ul>
	    	<!-- <ul class="ukb-nav-videos nav navbar-nav">
	        <li id="movies">
						<a href="{{route('user.videotype', 'movies')}}"> 
							{{trans('messages.movies')}}
						</a> 
					</li>
					<li id="animations">
						<a href="{{route('user.videotype', 'animations')}}"> 
							{{trans('messages.animations')}}
						</a> 
					</li>  
	      </ul> -->




				

	      <!-- <div id="frame-search" class="frame-search">
			  
	        <form action="{{route('search-all')}}" class="navbar-form navbar-left" method="post">  
	          <div class="input-group">
				      <input name="key" type="text" id="search-input" class="form-control search-input typeahead" placeholder="{{trans('messages.Search_placeholder')}}" autocomplete="false">
				      <span class="input-group-btn">
				        <button class="btn btn-search btn-primary" type="submit"> 
				      		<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				      		<span class="sr-only">{{trans('messages.search')}}!</span>
				      	</button>
				      </span>
				    </div>
	        </form> 
	      </div> -->

	      <ul class="nav navbar-nav navbar-right"> 
	        <li class="dropdown"> 
	          @include('r.chunks._login_block') 
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</header>
