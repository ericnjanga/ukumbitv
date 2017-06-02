<div class="row footer">

<p>
	@if(Setting::get('playstore'))

	    <a href="{{Setting::get('playstore')}}" class="get-app-out">
	        <img src="{{asset('playstore.png')}}" style="height: 35px;">
	    </a>

    @endif

    @if(Setting::get('appstore'))

    <a href="{{Setting::get('appstore')}}" class="get-app-out">
        <img src="{{asset('app-store.png')}}" style="height: 35px;">
    </a>
    @endif

	<a href="{{url('/')}}" target="_blank"> &copy; 2017 - @if(Setting::get('site_name')) {{Setting::get('site_name') }} @else {{tr('site_name')}} @endif</a>
</p>
</div>
