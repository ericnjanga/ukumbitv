<div class="youtube-nav signup-nav">
    <div class="row">
        <div class="test you-image">
            <a href="{{route('user.dashboard')}}" class="y-image">
                @if(Setting::get('site_logo'))
                    <img src="{{Setting::get('site_logo')}}">
                @else
                    <img src="{{asset('logo.png')}}">
                @endif
            </a>
        </div><!--test end-->

        <div class="y-button">

            <ul class="nav navbar-nav">

                @if(Setting::get('admin_language_control') == 0)
                
                <li  class="dropdown">
            
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="padding: 5px 15px; margin-top: 3px; margin-right: 5px;color: #cc181e"><i class="fa fa-globe"></i> <b class="caret"></b></a>

                    <ul class="dropdown-menu">

                        @foreach(getActiveLanguages() as $h => $language)

                            <li class="{{(\Session::get('locale') == $language->folder_name) ? 'active' : ''}}" ><a href="{{route('user_session_language', $language->folder_name)}}" style="{{(\Session::get('locale') == $language->folder_name) ? 'background-color: #cc181e' : ''}}">{{$language->folder_name}}</a></li>
                        @endforeach
                    </ul>
                 
                </li>
                
                @endif

            </ul>

        	@if(Auth::check())
        		<a href="{{route('user.profile')}}" class="y-signin">{{tr('back_profile')}}</a>
        	@else
        		<a href="{{route('user.register.form')}}" class="y-signin">{{tr('signup')}}</a>
                <a href="{{route('user.login.form')}}" class="y-signin">{{tr('login')}}</a>
        	@endif
        
        </div><!--y-button end-->

    </div><!--end of row-->
</div><!--end of youtube-nav-->