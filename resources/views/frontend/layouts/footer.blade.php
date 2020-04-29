<!-- Footer -->
<footer class="site-footer style1">
    <!-- newsletter part -->
    @if(Request::segment(1)== '' || Request::segment(1)== 'home')
    <div class="dlab-newsletter">
        <div class="container">
            <div class="ft-contact wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                <div class="ft-contact-bx">
                    <img src="{{ asset('images/icon1.png') }}" alt=""/>
                    <h4 class="title">Address</h4>
                    {!! $webmaster->address !!}
                </div>
                <div class="ft-contact-bx">
                    <img src="{{ asset('images/icon2.png') }}" alt=""/>
                    <h4 class="title">Phone</h4>
                    {{ $webmaster->phone_no }}
                </div>
                <div class="ft-contact-bx">
                    <img src="{{ asset('images/icon3.png') }}" alt=""/>
                    <h4 class="title">Email Contact</h4>
                    {{ $webmaster->email }}
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="footer-top"  style="background-image:url(images/bg3.png); background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-6 col-xl-4 col-lg-4 col-sm-4 footer-col-4">
                    <div class="widget widget_services border-0">
                        <h5 class="footer-title text-white">Company</h5>
                        <ul>
                            @foreach ($footMenus as $footCompMenu)
                                <li><a href="{{ $footCompMenu['link'] }}">{!! $footCompMenu['label'] !!}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-6 col-xl-4 col-lg-4 col-sm-4 footer-col-4">
                    <div class="widget widget_services border-0">
                        <h5 class="footer-title text-white">Useful Link</h5>
                        <ul>
                            @foreach ($useFullMenus as $usefullMenu)
                                <li><a href="{{ $usefullMenu['link'] }}">{{ $usefullMenu['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4 col-lg-4 col-sm-4 footer-col-4 ">
                    <div class="widget">
                        <h5 class="footer-title text-white">About {{  ucfirst(preg_replace('/[A-Z]/', ' $0', $webmaster->name )) }}</h5>
                        <p class="text-capitalize m-b20">{!! $webmaster->description !!}</p>
                        <ul class="list-inline m-a0">
                            @foreach ($sosmed as $medsos)
                                <li><a href="javascript:void(0);" class="site-button {{ ucfirst($medsos->social_name) }} circle"><i class="{{ $medsos->icon_name }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 text-left "> <span>Copyright &copy; 2020 VimaCMS, Allright reserved</span></div>
                <div class="col-md-6 col-sm-6 text-right "> 
                    <div class="widget-link "> 
                        <ul>
                            @foreach ($footMenus as $menuItem)
                                <li><a href="{{ $menuItem['link'] }}">{{ $menuItem['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer END-->
