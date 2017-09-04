<div class="login-block">
    <div class="login-info">
        <div class="login-text">{{$videoCount}} videos left</div>
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
</div>