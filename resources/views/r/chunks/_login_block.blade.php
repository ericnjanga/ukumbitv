<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

  <span class="nav-user-access">
  	<span class="login-info">
      <span class="login-text">@if(isset($videoCount)){{$videoCount}} videos left @else Unlimited videos @endif</span>
      <a href="{{route('user.package')}}" class="login-upgrade">upgrade package</a>
  	</span> 
		<img src="{{asset('r/img/no-img.png')}}" alt="">
  </span>
	<span class="caret"></span>
</a>
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