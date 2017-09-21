<div class="nav-user-access">
	<span class="nav-package-info">
    <span class="login-text">
    	@if(isset($videoCount))
    		{{$videoCount}} {{trans('messages.videos_left')}}
    	@else 
    		{{$videoCount}} {{trans('messages.unlimited_videos')}} 
    	@endif
    </span>
    <span id="link-update-package" data-route="{{route('user.package')}}">
		@if(Auth::user()->paymentPlans[0]->flag != 3)
    	{{trans('messages.msg_upgrade')}} 
    @else
    @endif
    </span> 
	</span>  
	 

	<a href="#" class="dropdown-toggle nav-user-tmb" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		<i class="fa fa-user-circle-o user-tmb" aria-hidden="true"></i>
		<!-- <img class="user-tmb" src="{{asset('r/img/no-img.png')}}" alt="">  -->
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><a href="{{route('user.account')}}">{{trans('messages.my_account')}}</a></li>
    <li><a href="{{route('user.package')}}">{{trans('messages.packages')}}</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="{{route('user.logout')}}">{{trans('messages.sign_out')}}</a></li> 
	</ul>
</div>