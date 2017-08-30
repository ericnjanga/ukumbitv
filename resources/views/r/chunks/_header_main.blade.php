<header class="landing-header">  


	<div class="main-header">
	  <div class="container">
	    <div class="row">
	      <div class="frame-logo"> 
	        <img src="http://test.ukumbitv.com/r/img/logo.png" alt=""> 
	      </div>
	      
	      <div class="frame-useraccount">
	        <a href="{{route('user.login.form')}}" class="butn butn-signin">{{l("Sign in")}}</a>
	      </div>
	    </div>
	  </div>
	</div>


  <div class="container landing-header__content">    
      <div class="row">
          <div class="col-sm-4 col-md-3 col-lg-2 col-xl-2">
              <div class="logo-block">
                  <img src="{{asset('r/img/logo.png')}}" alt="">
              </div>
          </div>
          <div class="col-sm-2 col-md-2 col-lg-1 col-xl-1 offset-sm-2 offset-md-4 offset-lg-7">
              <a href="{{route('user.login.form')}}" class="butn butn-signin">{{l("Sign in")}}</a>
          </div>
          
      </div>
      <div class="row align-items-end">
          <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xl-5 offset-xl-1">
              <div class="title-white">{{l("Enjoy the finest African productions")}}</div>
              <div class="title-white-add upper">{{l("Unlimited high-definition videos at your fingertips")}}</div>
              <div>
                  <a href="{{route('user.register.form')}}" class="btn btn-cta1b btn-lg">{{trans('messages.home_cta')}}</a>
              </div>
          </div>
          <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1 offset-md-2 offset-lg-3">
              <div class="down-block">
                  <span class="icon icon-scroll-arrow-to-down"></span>
                  <div>{{l("Scroll down")}}</div>
              </div>
          </div>
      </div>
  </div> 



	<div id="intro-video"></div>




</header>