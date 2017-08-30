<header class="landing-header">  


	<div class="main-header">
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
	</div>


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


	<a class="btn-down" href="">
   	<span class="icon icon-scroll-arrow-to-down"></span>
    <span>{{l("Scroll down")}}</span>
  </a>


</header>