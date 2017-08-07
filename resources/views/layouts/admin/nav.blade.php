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
                <a href="{{route('admin.profile')}}">{{ Auth::guard('admin')->user()->type }}</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul id="sidebar-menu" class="sidebar-menu">
            <li id="dashboard">
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>{{tr('dashboard')}}</span>
                </a>
            </li>

            @if(Auth::guard('admin')->user()->type == 'admin')
            <li id="users" data-btn-add="{{route('admin.add.user')}}" data-btn-view="{{route('admin.users')}}">
                <a href="{{route('admin.users')}}">
                    <i class="fa fa-user"></i> <span>{{tr('users')}}</span>
                </a>
            </li>

            <li id="categories" data-btn-add="{{route('admin.add.category')}}" data-btn-view="{{route('admin.categories')}}">
                <a href="{{route('admin.categories')}}">
                    <i class="fa fa-suitcase"></i> <span>{{tr('categories')}}</span>
                </a>
            </li>
            <li id="actors" data-btn-add="{{route('admin.add.actor')}}" data-btn-view="{{route('admin.actors')}}">
                <a href="{{route('admin.actors')}}">
                    <i class="fa fa-smile-o"></i> <span>{{tr('actors')}}</span>
                </a>
            </li>
            <li id="directors" data-btn-add="{{route('admin.add.director')}}" data-btn-view="{{route('admin.directors')}}">
                <a href="{{route('admin.directors')}}">
                    <i class="fa fa-smile-o"></i> <span>{{tr('directors')}}</span>
                </a>
            </li>
            <li id="langs" data-btn-add="{{route('admin.add.lang')}}" data-btn-view="{{route('admin.langs')}}">
                <a href="{{route('admin.langs')}}">
                    <i class="fa fa-smile-o"></i> <span>{{tr('langs')}}</span>
                </a>
            </li>
            <li id="videos" data-btn-add="{{route('admin.add.movie')}}" data-btn-view="{{route('admin.videos')}}">
                <a href="{{route('admin.videos')}}">
                    <i class="fa fa-video-camera"></i> <span>{{tr('videos')}}</span>
                </a>
            </li>
            <li id="producer_agents" data-btn-add="{{route('admin.add.producer-agent')}}" data-btn-view="{{route('admin.producer-agents')}}">
                <a href="{{route('admin.producer-agents')}}">
                    <i class="fa fa-smile-o"></i> <span>Producer Agents</span>
                </a>
            </li>
            <li id="movie_producers" data-btn-add="{{route('admin.add.movie-producer')}}" data-btn-view="{{route('admin.movie-producers')}}">
                <a href="{{route('admin.movie-producers')}}">
                    <i class="fa fa-smile-o"></i> <span>Movie Producers</span>
                </a>
            </li>

                <li id="payment_plans" data-btn-add="{{route('admin.pay-plans')}}" data-btn-view="{{route('admin.pay-plans')}}">
                    <a href="{{route('admin.pay-plans')}}">
                        <i class="fa fa-credit-card"></i> <span>{{tr('pay_plans')}}</span>
                    </a>
                </li>

            <li id="payments" data-btn-add="{{route('admin.user.payments')}}" data-btn-view="{{route('admin.user.payments')}}">
                <a href="{{route('admin.user.payments')}}">
                    <i class="fa fa-credit-card"></i> <span>{{tr('payments')}}</span>
                </a>
            <!-- <ul class="treeview-menu">
                  <li id="user-payments"><a href="{{route('admin.user.payments')}}">
                      <i class="fa fa-credit-card"></i> <span>{{tr('user_payments')}}</span>
                  </a></li>
                  <li id="video-subscription"><a href="{{route('admin.user.video-payments')}}">
                      <i class="fa fa-credit-card"></i> <span>{{tr('video_payments')}}</span>
                  </a></li>
              </ul> -->
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
                        <i class="fa fa-users"></i> <span>{{tr('moderators')}}</span>
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
                        <i class="fa fa-book"></i> <span>{{tr('pages')}}</span>
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
                        <i class="fa fa-university"></i> <span>{{tr('banner_videos')}}</span>
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
                @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>