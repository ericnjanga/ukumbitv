<header class="landing-header">


	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="ukb-navbar-brand navbar-brand" href="/"><img src="{{asset('r/img/logo.png')}}" alt=""></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
	    	<!-- <ul class="ukb-nav-videos nav navbar-nav">
	        <li id="movies">
						<a href="{{route('user.videotype', 'movies')}}"> 
							Movies
						</a> 
					</li>
					<li id="animations">
						<a href="{{route('user.videotype', 'animations')}}"> 
							Animation
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
	      	<li>
	      		<a href="{{route('user.login.form')}}" class="btn btn-link btn-lg">{{l("Sign in")}}</a>
	      	</li>
	        <!-- <li class="dropdown"> 
	          @include('r.chunks._login_block') 
	        </li> -->
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>  

<!-- 	<div class="main-header">
	  <div class="container">
	    <div class="row">
	      <div class="frame-logo"> 
	        <img src="http://test.ukumbitv.com/r/img/logo.png" alt=""> 
	      </div>
	      
	      <div class="frame-useraccount">
	        <a href="{{route('user.login.form')}}" class="btn btn-link btn-lg">{{l("Sign in")}}</a>
	      </div>
	    </div>
	  </div>
	</div> -->


  <div class="container landing-header__content">    
    <div class="row">
      <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xl-5 offset-xl-1">
        <div class="title-white">{{l("Enjoy the finest African productions")}}</div>
        <div class="title-white-add upper">{{l("Unlimited high-definition videos at your fingertips")}}</div>
        <div>
          <a href="{{route('user.register.form')}}" class="btn btn-cta1b btn-lg">{{trans('messages.home_cta')}}</a>
        </div>
      </div> 
    </div>
  </div> 



	<div id="intro-video"></div>


	<a class="btn-down" href="#section1">
   	<span class="icon icon-scroll-arrow-to-down"></span>
    <!-- <span>{{l("Scroll down")}}</span> -->
  </a>


</header>