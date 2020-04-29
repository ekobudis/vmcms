<!-- contact area -->
<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/bg5.jpg);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
        </div>
    </div>
</div>
<div class="content-block">
    <!-- About Us -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="widget sidebar-widget ext-sidebar-menu widget_nav_menu">
                        @php $services = \App\Helpers\Helper::getProductServiceItem(); @endphp
                        <ul class="menu">
                            <li><a href="javascript:void(0);">all services</a> </li>
                            @foreach ($services as $item)
                            <li><a href="javascript:void(0);">{{ $item->name }}</a>  </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <div class="download-file">
                            <h4 class="title">Get your brochures</h4>
                            @php $comDoc = \App\Helpers\Helper::getCompanyDocument(); @endphp
                            <ul>
                                @foreach ($comDoc as $doc)
                                <li>
                                    <a href="javascript:void(0);" target="_blank">
                                        <div class="text">{{ $doc->description }}</div>
                                        <i class="fa fa-download"></i>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7 m-b30">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 m-b30">
                            <div class="dlab-box">
                                <div class="dlab-media"> <a href="javascript:void(0);"><img src="images/about/pic6.jpg" alt=""></a> </div>
                                <div class="dlab-info m-t30 ">
                                    <h4 class="dlab-title m-t0"><a href="javascript:void(0);">The Initial Planning </a></h4>
                                    <p>There are many variations of passages of Lorem Ipsum typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                    <p>There are many variations of passages of Lorem Ipsum typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley. </p>
                                    <p>There are many variations of passages of Lorem Ipsum typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="dlab-box">
                                <div class="dlab-media m-b30 p-b5"> <a href="javascript:void(0);"><img src="images/our-services/pic2.jpg" alt=""></a></div>
                                <div class="dlab-media"> <a href="javascript:void(0);"><img src="images/our-services/pic3.jpg" alt=""></a></div>
                                <div class="dlab-info m-t30">
                                    <h4 class="dlab-title m-t0"><a href="javascript:void(0);">From Start To finish</a></h4>
                                    <p>There are many variations of passages of Lorem Ipsum typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                    <p>There are many variations of passages of Lorem Ipsum typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley. </p>
                                    <p>There are many variations of passages of Lorem Ipsum typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services -->
</div>
<!-- contact area END -->