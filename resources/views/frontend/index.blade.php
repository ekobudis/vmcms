@extends('frontend.layouts.app')

@section('head')
    @include('frontend.layouts.head')
    @php 
        $webmaster = \App\Helpers\Helper::getWebmaster();
        $topMenus = \App\Helpers\Helper::getFooterMenuTop();
        $publicMenus = \App\Helpers\Helper::getHeaderMenuFrontEnd();
        $footMenus = \App\Helpers\Helper::getFooterMenuFrontEnd();
        $useFullMenus = \App\Helpers\Helper::getFooterUsefull();
        $sosmed = \App\Helpers\Helper::getWebSocial();
        $phones = \App\Helpers\Helper::getPhoneCall();
		$mails = \App\Helpers\Helper::getMailAddress();
		$categorys = \App\Helpers\Helper::getCategoryServiceItem();
    @endphp
@stop

@section('content')
    @if(Request::segment(1)== '' || Request::segment(1)== 'home')
        <!-- Slider Area -->
        <div class="main-slider style-two default-banner" id="home">
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <div id="welcome_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="reveal-add-on36" data-source="gallery" style="background:#ffffff;padding:0px;">
                    <!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
                        @include('frontend.pages.slider')
                    </div>
                </div>
            </div><!-- END REVOLUTION SLIDER -->
        </div>        
        <!-- Slider END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Our Services -->
			<div class="section-full bg-gray content-inner">
				<div class="container">
					<div class="section-head text-center">
						<h2 class="title"> Our Service</h2>
					</div>
					<div class="section-content row">
						@php $itemX = 1; @endphp
						@foreach ($categorys as $itemService)
						@php
							$length_no = 2;
							$tmpNo = sprintf('%0'.$length_no.'s', $itemX);
						@endphp
						<div class="col-md-6 col-lg-4 col-sm-12 service-box style3 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.2s">
							<div class="icon-bx-wraper" data-name="{{ $tmpNo }}">
								<div class="icon-lg">
									<a href="javascript:void(0);" class="icon-cell"><i class="{{ $itemService->icon }}"></i></a>
								</div>
								<div class="icon-content">
									<h2 class="dlab-tilte">{{ $itemService->name }}</h2>
									{!! \Illuminate\Support\Str::substr($itemService->description,0,80) !!}
								</div>
							</div>
						</div>
						@php $itemX = $itemX + 1; @endphp
						@endforeach
					</div>
				</div>
			</div>
            <!-- Our Services End -->
            <!-- Industries Served -->
			<div class="section-full bg-gray content-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.3s">
							<div class="blog-post blog-grid blog-rounded blog-effect1">
								<div class="dlab-post-media dlab-img-effect rotate"> <a href="javascript:void(0);"><img src="images/our-work/plastic/pic1.jpg" alt=""></a> </div>
								<div class="dlab-info p-a20 border-1">
                                    <div class="dlab-post-title">
                                        <h4 class="post-title"><a href="blog-single.html">Plastics Institute</a></h4>
                                    </div>
									<div class="dlab-post-text">
                                       <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true.</p>
                                    </div>
									<div class="dlab-post-readmore"> 
										<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button btnhover20">READ MORE</a>
									</div>
                                </div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.6s">
							<div class="blog-post blog-grid blog-rounded blog-effect1">
								<div class="dlab-post-media dlab-img-effect rotate"> <a href="javascript:void(0);"><img src="images/our-work/plastic/pic2.jpg" alt=""></a> </div>
								<div class="dlab-info p-a20 border-1">
                                    <div class="dlab-post-title">
                                        <h4 class="post-title"><a href="blog-single.html">Institute Of Packaging</a></h4>
                                    </div>
                                    <div class="dlab-post-text">
                                       <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true.</p>
									</div>
									<div class="dlab-post-readmore"> 
										<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button btnhover20">READ MORE</a>
									</div>
                                </div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.9s">
							<div class="dlab-box m-b30"> 
								<div class="dlab-media dlab-img-overlay1 dlab-img-effect on rotate no-hover"> <img src="images/about/pic14.jpg" alt="">
									<div class="dlab-info-has p-a20 no-hover ">
										<a href="javascript:void(0);" class="site-button btnhover20 button-sm m-b10">Packaging</a>
										<div class="dlab-post-meta text-white">
											<ul>
												<li class="post-date"> <strong>10 Aug</strong> <span> 2016</span> </li>
												<li class="post-author"> By <a href="javascript:void(0);">demongo</a> </li>
											</ul>
										</div>
										<div class="dlab-post-title">
											<h5 class="post-title"><a href="blog-single.html">Merchant's Chamber.</a></h5>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.3s">
							<div class="blog-post blog-grid blog-rounded blog-effect1">
								<div class="dlab-post-media dlab-img-effect rotate"> <a href="javascript:void(0);"><img src="images/our-work/plastic/pic2.jpg" alt=""></a> </div>
								<div class="dlab-info p-a20 border-1">
                                    <div class="dlab-post-title">
                                        <h4 class="post-title"><a href="blog-single.html">Chemical Council</a></h4>
                                    </div>
									<div class="dlab-post-text">
                                       <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true.</p>
                                    </div>
									<div class="dlab-post-readmore"> 
										<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button btnhover20">READ MORE</a>
									</div>
                                </div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.6s">
							<div class="blog-post blog-grid blog-rounded blog-effect1">
								<div class="dlab-post-media dlab-img-effect rotate"> <a href="javascript:void(0);"><img src="images/our-work/plastic/pic3.jpg" alt=""></a> </div>
								<div class="dlab-info p-a20 border-1">
                                    <div class="dlab-post-title">
                                        <h4 class="post-title"><a href="blog-single.html">Association Of Industries</a></h4>
                                    </div>
                                    <div class="dlab-post-text">
                                       <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true.</p>
									</div>
									<div class="dlab-post-readmore"> 
										<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button btnhover20">READ MORE</a>
									</div>
                                </div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.9s">
							<div class="blog-post blog-grid blog-rounded blog-effect1">
								<div class="dlab-post-media dlab-img-effect rotate"> <a href="javascript:void(0);"><img src="images/our-work/plastic/pic4.jpg" alt=""></a> </div>
								<div class="dlab-info p-a20 border-1">
                                    <div class="dlab-post-title">
                                        <h4 class="post-title"><a href="blog-single.html">Industries Association</a></h4>
                                    </div>
                                    <div class="dlab-post-text">
                                       <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true.</p>
                                    </div>
									<div class="dlab-post-readmore"> 
										<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button btnhover20">READ MORE</a>
									</div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Industries Served End -->
            <!-- Latest Project Section -->
            <div class="section-full bg-white content-inner-2 project-slider" style="background-image:url(images/bg11.jpg); background-repeat:no-repeat;
			background-position:right bottom;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-6 p-lr0">
							<div class="project-carousel-2 owl-carousel owl-btn-center-lr owl-btn-1 black  wow fadeInLeft" data-wow-delay="0.2s"  data-wow-duration="2s">
								<div class="item">
									<div class="dlab-media dlab-img-overlay1 dlab-img-effect zoom">
										<img src="images/portfolio/construct/image_1.jpg" alt="">
									</div>
								</div>
								<div class="item">
									<div class="dlab-media dlab-img-overlay1 dlab-img-effect zoom">
										<img src="images/portfolio/construct/image_2.jpg" alt="">
									</div>
								</div>
								<div class="item">
									<div class="dlab-media dlab-img-overlay1 dlab-img-effect zoom">
										<img src="images/portfolio/construct/image_3.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="about-content wow fadeIn" data-wow-delay="0.2s"  data-wow-duration="2s">
								<div class="section-head style2">
									<h2 class="title">Our Latest Project Industrial <br/>Style Apartment</h2>
									<p>Praesent pharetra orci odio, ut mattis tellus ullamcorper ornare. Suspendisse ullamcorper metus in erat viverra, vehicula pharetra dolor accumsan. In arcu ex, rutrum finibus malesuada </p>
								</div>
								<div class="m-b30">
									<ul class="list-details">
										<li>
											<strong>Clients:</strong>
											<span>Ethan Hunt</span>
										</li>
										<li>
											<strong>Completion:</strong>
											<span>February 5th, 2017</span>
										</li>
										<li>
											<strong>Project Type:</strong>
											<span>Villa, Residence</span>
										</li>
									</ul>
								</div>
								<div class="">
									<a href="portfolio-details.html" class="site-button btnhover20">View Portfolio</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Content Section End -->
            <!-- Client Logo -->
            @include('frontend.pages.client-logo')
            <!-- Client Logo End -->
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
