<nav class="ukb-main-header navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="{{asset('r/img/logo.png')}}" alt=""></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    	<ul class="ukb-nav-videos nav navbar-nav">
        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>  -->
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
      </ul>

      <div id="frame-search" class="frame-search">
        <form action="{{route('search-all')}}" class="navbar-form navbar-left" method="post">  
          <div class="input-group">
			      <input name="key" type="text" id="search-input" class="form-control search-input typeahead" placeholder="{{trans('messages.Search_placeholder')}}" autocomplete="false">
			      <span class="input-group-btn">
			        <button class="btn btn-search btn-primary" type="submit">{{trans('messages.search')}}!</button>
			      </span>
			    </div><!-- /input-group -->
        </form> 
      </div>

      <ul class="nav navbar-nav navbar-right"> 
        <li class="dropdown"> 
          @include('r.chunks._login_block') 
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>








<header class="main-header">
  <div class="container-fluid">
    <div class="row">
      <div class="frame-logo">
        <a href="/">
         	<img src="{{asset('r/img/logo.png')}}" alt="">
        </a>
      </div>
      <div id="frame-search" class="frame-search">
        <form action="{{route('search-all')}}" method="post">  
          <div class="input-group">
			      <input name="key" type="text" id="search-input" class="form-control search-input typeahead" placeholder="{{trans('messages.Search_placeholder')}}" autocomplete="false">
			      <span class="input-group-btn">
			        <button class="btn btn-search btn-primary" type="submit">{{trans('messages.search')}}!</button>
			      </span>
			    </div><!-- /input-group -->
        </form> 
      </div>
      <div class="frame-useraccount">
        <!-- <a style="position:absolute;" href="{{route('user.reset-trial')}}">RESET TRIAL</a> -->
          @include('r.chunks._login_block')
      </div>
    </div>
  </div>
</header>
