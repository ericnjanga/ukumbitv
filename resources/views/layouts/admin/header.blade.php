<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
    	UkumbiTV - Admin 
      <!-- <span class="logo-mini">UkumbiTV - Admin</span> 
        <span class="logo-lg">{{Setting::get('site_name')}}</span> -->
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

        <!-- <a href="" class="btn btn-sm btn-default ml15">Hello</a> -->

        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="display:none;">
            <span class="sr-only">{{trans('messages.Toggle_navigation')}}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
							<li>
								<a href="https://www.pinterest.com/pin/237564949076657603/" target="_blank">** Design Inspiration **</a>
							</li>
                <li class="dropdown notifications-menu"> 
                    <a href="{{url('/')}}" class="btn btn-link" target="_blank"> 
                        <i class="fa fa-external-link"></i>  
                    </a> 
                </li>

                <li class="dropdown user user-menu">

                    <a href="{{route('admin.profile')}}" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="@if(Auth::guard('admin')->user()->picture){{Auth::guard('admin')->user()->picture}} @else {{asset('admin-css/dist/img/avatar.png')}} @endif" class="user-image" alt="User Image">
                      <span class="hidden-xs">{{Auth::guard('admin')->user()->name}}</span>
                    </a>
                    
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="@if(Auth::guard('admin')->user()->picture){{Auth::guard('admin')->user()->picture}} @else {{asset('admin-css/dist/img/avatar.png')}} @endif" class="img-circle" alt="User Image">

                            <p>
                              {{Auth::guard('admin')->user()->name}}
                              <small>{{tr('admin')}}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                 
                      <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('admin.profile')}}" class="btn btn-default btn-flat">{{tr('profile')}}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('admin.logout')}}" class="btn btn-default btn-flat">{{tr('logout')}}</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>

</header>

