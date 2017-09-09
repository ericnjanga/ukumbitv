<div class="nav-user-access">
	<span class="nav-package-info">
    <span class="login-text">@if(isset($videoCount)){{$videoCount}} videos left @else Unlimited videos @endif</span>
    <span id="link-update-package" data-route="{{route('user.package')}}">
    	upgrade package
    </span>
    <!-- <a href="{{route('user.package')}}" class="login-upgrade">upgrade package</a> -->
	</span>  
	 

	<a href="#" class="dropdown-toggle nav-user-tmb" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		<img class="user-tmb" src="{{asset('r/img/no-img.png')}}" alt="">
	  
		<span class="caret"></span>
	</a>
</div>
<ul class="dropdown-menu">
  <li><a href="#">Action</a></li>
  <li><a href="#">Another action</a></li>
  <li><a href="#">Something else here</a></li>
  <li role="separator" class="divider"></li>
  <li><a href="#">Separated link</a></li>
</ul>



<!-- 
<div class="login-block">
    <div class="login-info">
        <div class="login-text">@if(isset($videoCount)){{$videoCount}} videos left @else Unlimited videos @endif</div>
        <a href="{{route('user.package')}}" class="login-upgrade">upgrade package</a>
    </div>
    <div class="img-block">
        <img src="{{asset('r/img/no-img.png')}}" alt="">
        <div class="account-block">
            <ul class="account-list">
                <li><a href="{{route('user.account')}}">My account</a></li>
                <li><a href="{{route('user.package')}}">Plan</a></li>
                <li><a href="{{route('user.logout')}}">Sign Out</a></li>
            </ul>
        </div>
    </div>
</div> -->