<header class="page_header_side page_header_side_sticked active-slide-side-header ds">
    <div class="side_header_logo ds ms">
        <a href="#">
            <span class="logo_text margin_0">{{ env('APP_PRODUCT') }}</span>
        </a>
    </div>
    <span class="toggle_menu_side toggler_light header-slide">
        <span></span>
    </span>
    <div class="scrollbar-macosx">
        <div class="side_header_inner">
            <!-- user -->
            <div class="user-menu">
                <ul class="menu-click">
                    <li>
                        <a href="#">
                            <div class="media">
                                <div class="media-left media-middle">
                                    @if(auth()->user()->avatar_image != '' || auth()->user()->avatar_image != null )
                                    <img src="{{ asset('images/'.auth()->user()->avatar_image) }}" alt="user">
                                    @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="user">
                                    @endif
                                </div>
                                <div class="media-body media-middle">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    Administrator
                                </div>
                            </div>
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-user"></i>Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-edit"></i>Change Password
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="dropdown-item">
                                    <i class="fa fa-sign-out"></i>Log Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- main side nav start -->
            <nav class="mainmenu_side_wrapper">
                <h3 class="dark_bg_color">Dashboard</h3>
                <ul class="menu-click">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-th-large"></i>
                            Dashboard
                        </a>
                    </li>
                </ul>
                <h3 class="dark_bg_color">Website</h3>
                <ul class="menu-click">
                    <li>
                        <a href="{{ route('admin.pages') }}"><i class="fa fa-user"></i>Pages</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-file-text"></i>Posts</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-suitcase"></i>Products</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-shopping-cart"></i>Categories</a>
                    </li>
                </ul>
                <h3 class="dark_bg_color">Settings</h3>
                <ul class="menu-click">
                    <li>
                        @php $settings = \App\Helpers\Helper::getWebmaster(); @endphp
                        @if(!empty($settings))
                        <a href="{{ route('admin.settings.edit',['id'=> $settings->id]) }}" class="{{ set_active('admin.settings.edit') }}">
                        @else
                        <a href="{{ route('admin.settings') }}" class="{{ set_active('admin.settings') }}">
                        @endif
                        <i class="fa fa-table"></i>Webmaster</a>
                    </li>
                </ul>
            </nav>
            <!-- eof main side nav -->
            <div class="with_padding grey text-center">
                10GB of<strong> 250GB</strong> Free
            </div>
        </div>
    </div>
</header>