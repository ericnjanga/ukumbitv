<footer>
    <div class="footer1 row">
        <div class="col-sm-2 foot-div">
            <div class="tube-image">
                @if(Setting::get('site_logo'))
                    <img src="{{Setting::get('site_logo')}}">
                @else
                    <img src="{{asset('logo.png')}}">
                @endif
            </div>                                 
        </div><!--end of col-sm-2-->

        <div class="col-sm-10 foot-content">

            <ul class="term">

                @if(Setting::get('playstore'))

                    <li>
                        <a href="{{Setting::get('playstore')}}" class="get-app-out">
                            <img src="{{asset('playstore.png')}}" style="height: 35px;">
                        </a>
                    </li>

                @endif

                @if(Setting::get('appstore'))
                
                <li>
                    <a href="{{Setting::get('appstore')}}" class="get-app-out">
                        <img src="{{asset('app-store.png')}}" style="height: 35px;">
                    </a>
                </li>

                @endif

                <li><a target="_blank" href="{{route('user.about')}}">{{tr('about')}}</a></li>
                <li><a target="_blank" href="{{route('user.terms-condition')}}">{{tr('terms_conditions')}}</a></li>
                <li><a target="_blank" href="{{route('user.privacy_policy')}}">{{tr('privacy')}}</a></li>
                <li><a target="_blank" href="{{url('/')}}" target="_blank">&#169; 2017 @if(Setting::get('site_name')) {{Setting::get('site_name') }} @else {{tr('site_name')}} @endif</a></li>
            </ul>
        </div>   
    </div><!--end of footer1-->
</footer>