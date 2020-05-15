<!-- Client logo -->
<div class="section-full dlab-we-find bg-img-fix p-t20 p-b20 bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title">Our Client</h2>
        </div>
        @php $clientLogo = \App\Helpers\Helper::getClient(); @endphp
        <div class="section-content">
            <div class="client-logo-carousel mfp-gallery gallery owl-btn-center-lr owl-carousel owl-btn-3">
                @foreach ($clientLogo as $cltLogo)
                <div class="item">
                    <div class="ow-client-logo">
                        <div class="client-logo"><a href="javascript:void(0);"><img src="{{ asset('images/clients/'.$cltLogo->logo) }}" alt=""></a></div>
                    </div>
                </div>    
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Client logo END -->