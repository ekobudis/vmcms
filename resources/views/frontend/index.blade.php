@extends('frontend.layouts.app')

@section('head')
    @include('frontend.layouts.head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
    @php 
        $webmaster = \App\Helpers\Helper::getWebmaster();
        $topMenus = \App\Helpers\Helper::getFooterMenuTop();
        $publicMenus = \App\Helpers\Helper::getHeaderMenuFrontEnd();
        $footMenus = \App\Helpers\Helper::getFooterMenuFrontEnd();
        $useFullMenus = \App\Helpers\Helper::getFooterUsefull();
        $sosmed = \App\Helpers\Helper::getWebSocial();
    @endphp
@stop

@section('content')
    @if(Request::segment(1)== '' || Request::segment(1)== 'home')
        <div class="main-slider style-two default-banner" id="home">
            <div id="rev_slider_1061_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="creative-freedom" data-source="gallery" style="background-color:#1f1d24;padding:0px;">
                <!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
                @include('frontend.pages.slider')
            </div><!-- END REVOLUTION SLIDER -->
        </div>        
        <!-- Slider END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Content Section -->
            <div class="section-full">
                <div class="row spno about-industry">
                    @php $i = 1; @endphp
                    @foreach ($homes as $item)
                        @if($i == 1 || $i == 5)
                            @php $colWidth = 8; @endphp
                        @else
                            @php $colWidth = 4; @endphp
                        @endif
                        <div class="col-lg-{{ $colWidth }} wow fadeIn" data-wow-duration="2s" data-wow-delay="{{ $item->data_delay }}s">
                            <div class="dlab-post-media dlab-img-effect zoom"> 
                                <img src="{{ asset('images/content/'.$item->banner_image) }}" alt="" class="img-cover">
                            </div>
                        </div>
                        <div class="col-lg-4 {{ $item->data_class }} wow fadeIn" data-wow-duration="2s" data-wow-delay="{{ $item->data_delay+2 }}s">
                            <div class="service-box style2">
                                <div>
                                    @if($item->title_class!= null)
                                    @php $titleClass = $item->title_class; @endphp
                                    @else
                                    @php $titleClass = ""; @endphp
                                    @endif
                                    <h2 class="title {{ $titleClass }}"><span>{{ $item->banner_subtitle }}</span> <br/>{{ $item->banner_title }}</h2>
                                    <p>{!! $item->banner_description !!}</p>
                                    <a href="#" class="site-button outline outline-2 btnhover11">READ MORE</a>
                                </div>
                            </div>
                        </div>
                        @php $i=$i+1; @endphp
                    @endforeach
                </div>
            </div>
            <!-- Content Section End -->
            @include('frontend.pages.client-logo')
        </div>
    @elseif(Request::segment(1)== 'contact' || Request::segment(1)== 'contact-us')
        @include('frontend.pages.contact')
    @elseif(Request::segment(1)== 'portofolio' || Request::segment(1)== 'galery')
        @include('frontend.pages.portofolio')
    @elseif(Request::segment(1)== 'product' || Request::segment(1)== 'services' || Request::segment(1)== 'product-services')
        @include('frontend.pages.service')
    @elseif(Request::segment(1)== 'career' || Request::segment(1)== 'recruitment')
        @include('frontend.pages.career')
    @elseif(Request::segment(1)== 'blog')
        @include('frontend.pages.blog')
    @elseif(Request::segment(1)== 'blog' && Request::segment(2) != '')
        @include('frontend.pages.blog')
    @endif
@stop

@section('footer')
    @push('scripts')
    <script type="text/javascript">
        
    </script>
    @endpush
@stop
