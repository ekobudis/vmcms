<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('images/logovm.png') }}" alt="VIMA Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">vimaCMS</span>
    </a>
    @if(auth()->check())
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(auth()->user()->avatar_image != '' || auth()->user()->avatar_image != null )
                <img src="{{ asset('images/'.auth()->user()->avatar_image) }}"  class="img-circle elevation-2" alt="user">
                @else
                <img src="{{ asset('images/default-avatar.png') }}"  class="img-circle elevation-2" alt="user">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ set_active('admin.dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header"><strong>Site Content</strong></li>
                <li class="nav-item">
                    <a href="{{ route('admin.pages') }}" class="nav-link {{ set_active('admin.pages') }}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Site Post</p>
                    </a>
                </li>
                @php $backendMenus = \App\Helpers\Helper::getBackEndMenus(); @endphp
                @foreach($backendMenus as $menuSystem)
                    @if($menuSystem->section_category!=0)
                    <li class="nav-item has-treeview">
                        <a class="nav-link" href="#"><i class="{{ $menuSystem->icon_name }}"></i> &nbsp;{{ ucfirst(preg_replace('/[A-Z]/', ' $0', $menuSystem->label)) }}<i class="right fas fa-angle-left"></i></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/pages/'.$menuSystem->id.'/category') }}"><i class="far fa-object-ungroup"></i> &nbsp;Categories</a></li>
                        </ul>
                    </li>
                    @endif
                @endforeach
                <li class="nav-item">
                    <a href="{{ route('admin.images') }}" class="nav-link {{ set_active('admin.images') }}">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>Slider Image</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.clients') }}" class="nav-link {{ set_active('admin.clients') }}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Client</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.careers') }}" class="nav-link {{ set_active('admin.careers') }}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Career</p>
                    </a>
                </li>
                <li class="nav-header">Settings</li>
                <li class="nav-item">
                    @php $settings = \App\Helpers\Helper::getWebmaster(); @endphp
                    @if(!empty($settings))
                    <a href="{{ route('admin.settings.edit',['id'=> $settings->id]) }}" class="nav-link {{ set_active('admin.settings.edit') }}">
                    @else
                    <a href="{{ route('admin.settings') }}" class="nav-link {{ set_active('admin.settings') }}">
                    @endif
                    <i class="nav-icon fas fa-cogs"></i>
                    <p class="text">Webmaster</p>
                    </a>
                </li>
                @if(!empty($settings))
                <li class="nav-item">
                    <a href="{{ route('admin.settings.user',['id'=> $settings->id]) }}" class="nav-link {{ set_active('admin.settings.user') }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p class="text">User Access</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings.menus',['id'=> $settings->id]) }}" class="nav-link {{ set_active('admin.settings.menus') }}">
                    <i class="nav-icon fas fa-bars"></i>
                    <p class="text">Menu Setting</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endif
    <!-- /.sidebar -->
</aside>