<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="@if(Auth::guard('admin')->user()->picture){{Auth::guard('admin')->user()->picture}} @else {{asset('admin-css/dist/img/avatar.png')}} @endif" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::guard('admin')->user()->name}}</p>
                <a href="{{route('admin.profile')}}">{{ tr('admin') }}</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li id="dashboard">
              <a href="{{route('admin.dashboard')}}">
                <i class="fa fa-dashboard"></i> <span>{{tr('dashboard')}}</span>
              </a>
              
            </li>

            <li class="treeview" id="users">

                <a href="#">
                    <i class="fa fa-user"></i> <span>{{tr('users')}}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li id="add-user"><a href="{{route('admin.add.user')}}"><i class="fa fa-circle-o"></i>{{tr('add_user')}}</a></li>
                    <li id="view-user"><a href="{{route('admin.users')}}"><i class="fa fa-circle-o"></i>{{tr('view_users')}}</a></li>
                </ul>
    
            </li>


            <li class="treeview" id="categories">
                <a href="{{route('admin.categories')}}">
                    <i class="fa fa-suitcase"></i> <span>{{tr('categories')}}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li id="add-category"><a href="{{route('admin.add.category')}}"><i class="fa fa-circle-o"></i>{{tr('add_category')}}</a></li>
                    <li id="view-categories"><a href="{{route('admin.categories')}}"><i class="fa fa-circle-o"></i>{{tr('view_categories')}}</a></li>
                </ul>

            </li>

            <li class="treeview" id="actors">
                <a href="{{route('admin.actors')}}">
                    <i class="fa fa-smile-o"></i> <span>{{tr('actors')}}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li id="add-actor"><a href="{{route('admin.add.actor')}}"><i class="fa fa-circle-o"></i>{{tr('add_actor')}}</a></li>
                    <li id="view-actors"><a href="{{route('admin.actors')}}"><i class="fa fa-circle-o"></i>{{tr('view_actors')}}</a></li>
                </ul>

            </li>

            <li class="treeview" id="directots">
                <a href="{{route('admin.directors')}}">
                    <i class="fa fa-smile-o"></i> <span>{{tr('directors')}}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li id="add-director"><a href="{{route('admin.add.director')}}"><i class="fa fa-circle-o"></i>{{tr('add_director')}}</a></li>
                    <li id="view-directors"><a href="{{route('admin.directors')}}"><i class="fa fa-circle-o"></i>{{tr('view_directors')}}</a></li>
                </ul>
            </li>

            <li class="treeview" id="langs">
                <a href="{{route('admin.langs')}}">
                    <i class="fa fa-smile-o"></i> <span>{{tr('langs')}}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li id="add-lang"><a href="{{route('admin.add.lang')}}"><i class="fa fa-circle-o"></i>{{tr('add_lang')}}</a></li>
                    <li id="view-langs"><a href="{{route('admin.langs')}}"><i class="fa fa-circle-o"></i>{{tr('view_langs')}}</a></li>
                </ul>

            </li>

            <li class="treeview" id="videos">
                <a href="{{route('admin.videos')}}">
                    <i class="fa fa-video-camera"></i> <span>{{tr('videos')}}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li id="add-video"><a href="{{route('admin.add.movie')}}"><i class="fa fa-circle-o"></i>{{tr('add_movie')}}</a></li>
                    <li id="add-video"><a href="{{route('admin.add.video')}}"><i class="fa fa-circle-o"></i>{{tr('add_video')}}</a></li>
                    <li id="view-videos"><a href="{{route('admin.videos')}}"><i class="fa fa-circle-o"></i>{{tr('view_videos')}}</a></li>
                </ul>

            </li>

            <li class="treeview" id="producer-agents">
                <a href="{{route('admin.producer-agents')}}">
                    <i class="fa fa-smile-o"></i> <span>Producer Agents</span> <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li id="add-producer-agent"><a href="{{route('admin.add.producer-agent')}}"><i class="fa fa-circle-o"></i>Add Producer Agent</a></li>
                    <li id="view-producer-agents"><a href="{{route('admin.producer-agents')}}"><i class="fa fa-circle-o"></i>View Producer Agent</a></li>
                </ul>
            </li>

            <li class="treeview" id="movie-producers">
                <a href="{{route('admin.movie-producers')}}">
                    <i class="fa fa-smile-o"></i> <span>Movie Producers</span> <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li id="add-movie-producer"><a href="{{route('admin.add.movie-producer')}}"><i class="fa fa-circle-o"></i>Add Movie Producer</a></li>
                    <li id="view-movie-producers"><a href="{{route('admin.movie-producers')}}"><i class="fa fa-circle-o"></i>View Movie Producer</a></li>
                </ul>
            </li>

            
            <li id="payments">
                <a href="{{route('admin.user.payments')}}">
                    <i class="fa fa-credit-card"></i> <span>{{tr('payments')}}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="user-payments"><a href="{{route('admin.user.payments')}}">
                        <i class="fa fa-credit-card"></i> <span>{{tr('user_payments')}}</span>
                    </a></li>
                    <li id="video-subscription"><a href="{{route('admin.user.video-payments')}}">
                        <i class="fa fa-credit-card"></i> <span>{{tr('video_payments')}}</span>
                    </a></li>
                </ul>
            </li>


            <li id="settings">
                <a href="{{route('admin.settings')}}">
                    <i class="fa fa-gears"></i> <span>{{tr('settings')}}</span>
                </a>
            </li>

            {{-- <li id="settings">
                <a href="{{route('admin.email.settings')}}">
                    <i class="fa fa-envelope"></i> <span>{{tr('email_settings')}}</span>
                </a>
            </li> --}}
 
            <li id="profile">
                <a href="{{route('admin.profile')}}">
                    <i class="fa fa-diamond"></i> <span>{{tr('account')}}</span>
                </a>
            </li> 
            <li>
                <a href="{{route('admin.logout')}}">
                    <i class="fa fa-sign-out"></i> <span>{{tr('sign_out')}}</span>
                </a>
            </li>




						<!-- not needed menu items -->
						<!-- not needed menu items -->
						<div style="display:none;">
	            <li class="treeview" id="moderators">
	                <a href="#">
	                    <i class="fa fa-users"></i> <span>{{tr('moderators')}}</span> <i class="fa fa-angle-left pull-right"></i>
	                </a>

	                <ul class="treeview-menu">
	                    <li id="add-moderator"><a href="{{route('admin.add.moderator')}}"><i class="fa fa-circle-o"></i>{{tr('add_moderator')}}</a></li>
	                    <li id="view-moderator"><a href="{{route('admin.moderators')}}"><i class="fa fa-circle-o"></i>{{tr('view_moderators')}}</a></li>
	                </ul> 
	            </li>
	            <li id="theme-settings">
	                <a href="{{route('admin.theme.settings')}}">
	                    <i class="fa fa-refresh"></i> <span>{{tr('theme_settings')}}</span>
	                </a>
	            </li>
	            <li id="custom-push">
	                <a href="{{route('admin.push')}}">
	                    <i class="fa fa-send"></i> <span>{{tr('custom_push')}}</span>
	                </a>
	            </li>
	            <li class="treeview" id="pages_id">
	                <a href="{{route('viewPages')}}">
	                    <i class="fa fa-book"></i> <span>{{tr('pages')}}</span> <i class="fa fa-angle-left pull-right"></i>
	                </a>
	                <ul class="treeview-menu">
	                    <li id="add_page"><a href="{{route('addPage')}}"><i class="fa fa-circle-o"></i>{{tr('add_page')}}</a></li>
	                    <li id="view_pages"><a href="{{route('viewPages')}}"><i class="fa fa-circle-o"></i>{{tr('view_pages')}}</a></li>
	                </ul>
	            </li>
	            <li id="spam_videos">
	                <a href="{{route('admin.spam-videos')}}">
	                    <i class="fa fa-flag"></i> <span>{{tr('spam_videos')}}</span>
	                </a>
	            </li>
	            <li id="help">
	                <a href="{{route('admin.help')}}">
	                    <i class="fa fa-question-circle"></i> <span>{{tr('help')}}</span>
	                </a>
	            </li>
	            <li class="treeview" id="banner-videos">
	                <a href="{{route('admin.banner.videos')}}">
	                    <i class="fa fa-university"></i> <span>{{tr('banner_videos')}}</span> <i class="fa fa-angle-left pull-right"></i>
	                </a>

	                <ul class="treeview-menu">
	                    @if(get_banner_count() < 6)
	                        <li id="add-banner-video"><a href="{{route('admin.add.banner.video')}}"><i class="fa fa-circle-o"></i>{{tr('add_video')}}</a></li>
	                    @endif
	                    <li id="view-banner-videos"><a href="{{route('admin.banner.videos')}}"><i class="fa fa-circle-o"></i>{{tr('view_videos')}}</a></li>
	                </ul>
	            </li>
						</div>
						<!-- not needed menu items -->
						<!-- not needed menu items -->
        </ul>

    </section>

    <!-- /.sidebar -->

</aside>