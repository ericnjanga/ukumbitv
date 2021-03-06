<header class="landing-header"> 
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">{{trans('messages.toggle_navigation')}}</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="ukb-navbar-brand navbar-brand" href="/"><img src="{{asset('r/img/logo.png')}}" alt="UkumbiTV" title="UkumbiTV"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  
	      <ul class="nav navbar-nav navbar-right"> 
	      	<li>
	      		<a href="{{route('user.login.form')}}" class="btn btn-link btn-lg">{{trans('messages.auth_signin')}}</a>
	      	</li> 
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>  
 		


	<article class="landing-header__hero">
		<!-- <h1>{{trans('messages.home_title1')}}</h1>
  	<p>{{trans('messages.home_substitle1')}}</p> -->
  	<a href="{{route('user.register.form')}}" class="btn btn-cta1b btn-lg">{{trans('messages.home_cta')}}</a>
	</article>



  <section class="landing-header__content">
	  @if(isset($recent_videos))
		  @foreach($recent_videos as $video)
			  <img data-src="{{$video->videoimage->imgPreview1}}" class="lazyload video-item__img" alt="{{$video->title}}">
		  @endforeach
	  @endif
  </section> 

  <div class="landing-header__footnotes">
  	{{trans('messages.home_footnote')}} 
  </div>
</header>