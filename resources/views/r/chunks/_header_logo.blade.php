<header class="main-header"> 
  <div class="container-fluid">
  	<div class="row">
  		<div class="frame-logo">
  			<a href="/">
         	<img src="{{asset('r/img/logo.png')}}" alt="">
  			</a>
  		</div>
  	</div>
  	
    <!-- @if(isset($back_url))
      <a href="{{$back_url}}" class="butn-back"><span class="icon icon-angle-pointing-to-left"></span></a>
    @endif
    <div class="row align-items-center">
      <div class="col-sm-3 col-md-3 col-lg-2 col-xl-2 offset-lg-5 offset-xl-5">
        <a href="{{route('user.dashboard')}}">
          <img src="{{asset('r/img/logo.png')}}" alt="">
        </a>
      </div>
      @if(\Auth::check())
        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 offset-sm-5 offset-md-5 offset-lg-1 offset-xl-1">
          @include('r.chunks._login_block')
        </div>
      @else
        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1 offset-sm-4 offset-md-4 offset-lg-1 offset-xl-2" style="border:10px solid;">
          <a href="{{route('user.login.form')}}" class="butn butn-signin">Sign in</a>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-2 col-xl-2">
          <a href="{{route('user.register.form')}}" class="butn butn-free">Try free trial</a>
        </div>
      @endif -->
 
  </div> 
</header>