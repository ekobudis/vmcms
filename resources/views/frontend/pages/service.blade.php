<!-- contact area -->
<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/bnr1.jpg);">
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
                        @php $services = \App\Helpers\Helper::getCategoryServiceItem(); @endphp
                        <ul class="menu">
                            @foreach ($services as $item)
                                <li><a href="{{ url($item->link) }}/{{ $item->slug }}">{{ $item->name }}</a>  </li>
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
                                    <a href="{{ asset('documents/'.$doc->document_filename) }}" target="_blank">
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
                        <div class="col-lg-12 col-md-12 m-b30">
                            <div class="dlab-box">
                                <div class="dlab-info m-t30 ">
                                    <h4 class="dlab-title m-t0"><a href="javascript:void(0);">The Initial Planning </a></h4>
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