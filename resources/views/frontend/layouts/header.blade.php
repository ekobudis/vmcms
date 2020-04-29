<header class="site-header mo-left header-transparent overlay header navstyle4">
    <div class="top-bar">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="dlab-topbar-left">
                    <ul>
                        @foreach ($topMenus as $topMenu)
                            <li><a href="{{ $topMenu['link'] }}">{{ $topMenu['label'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="dlab-topbar-right">
                    <a href="" class="site-button btnhover21 radius-no">GET A QUOTE</a>						
                </div>
            </div>
        </div>
    </div>
    <!-- main header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container clearfix">
                <!-- website logo -->
                <div class="logo-header mostion logo-dark">
                    <a href=""><img src="{{ asset('images/logotonsco.png') }}" alt=""></a>
                </div>
                <!-- nav toggle button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- extra nav -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        <button id="quik-search-btn" type="button" class="site-button-link"><i class="la la-search"></i></button>
                    </div>
                </div>
                <!-- Quik search -->
                <div class="dlab-quik-search ">
                    <form action="#">
                        <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                        <span id="quik-search-remove"><i class="ti-close"></i></span>
                    </form>
                </div>
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <div class="logo-header d-md-block d-lg-none">
                        <a href="index.html"><img src="{{ asset('images/logotonsco.png') }}" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav">
                        @if($publicMenus)
                            @foreach($publicMenus as $menus)
                                @if(count($menus['child']))
                                    @if( $menus['child'] )
                                    <li>
                                        <a href="javascript:;">{{ $menus['label'] }} <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu tab-content">
                                        @foreach( $menus['child'] as $child )
                                            @if(count($child['child']))
                                            <li>
                                                <a href="javascript:;">{{ $child['label'] }} <i class="fa fa-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    @foreach ($child['child'] as $item)
                                                    <li><a href="{{ $item['link'] }}">{{ $item['label'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @else
                                            <li><a href="{{ $child['link'] }}">{{ $child['label'] }}</a></li>
                                            @endif
                                        @endforeach
                                        </ul>
                                    </li><!-- /.sub-menu -->
                                    @endif
                                @else
                                <li><a href="{{ $menus['link'] }}">{{ $menus['label'] }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>