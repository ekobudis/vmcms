<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/career.jpg);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
        </div>
    </div>
</div>
<div class="section-full content-inner contact-page-8 overlay-black-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 text-white">
                <div class="row">
                    <div class="col-lg-12 col-md-12 m-b30">
                        <div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
                            <div class="icon-content">
                                <h5 class="dlab-tilte">
                                    <span class="icon-sm text-primary"><i class="ti-location-pin"></i></span> 
                                    Company Address
                                </h5>
                                <p>{!! $webmaster->address !!}</p>
                                <h6 class="m-b15 text-black font-weight-400"><i class="ti-alarm-clock"></i> Office Hours</h6>
                                <p class="m-b0">{{ $webmaster->workHour->hour_name }} - {{ $webmaster->workHour->hour_desc }}</p>
                                <p>Sat, Sun - Close</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 m-b30">
                        <div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
                            <div class="icon-content">
                                <h5 class="dlab-tilte">
                                    <span class="icon-sm text-primary"><i class="ti-email"></i></span> 
                                    E-mail
                                </h5>
                                <p class="m-b0">{{ $webmaster->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 m-b30">
                        <div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
                            <div class="icon-content">
                                <h5 class="dlab-tilte">
                                    <span class="icon-sm text-primary"><i class="ti-mobile"></i></span> 
                                    Phone Numbers
                                </h5>
                                <p class="m-b0">{{ $webmaster->phone_no }}</p>
                                <p class="m-b0">{{ $webmaster->mobile_no }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 m-b10">
                <!-- Left & right section start -->
                <div class="section-full bg-white content-inner">
                    <div class="container">
                        <div class="row"><!-- BG Primary Color -->
                            <!-- Accordion Bg Primary -->
                            @php $careers = \App\Helpers\Helper::getCareerInfo(); @endphp
                            <div class="col-lg-12">
                                <div class="sort-title clearfix text-center">
                                    <h4>Open Recruitment</h4>
                                </div>
                                <div class="dlab-accordion box-sort-in m-b30 space active-bg accdown1" id="accordion001">
                                    @php $i = 1; @endphp
                                    @foreach ($careers as $lstCareer)
                                    @if($i==1)
                                    <div class="panel">
                                        <div class="acod-head">
                                            <h6 class="acod-title"> <a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="false" class="collapsed">{{ $i }}. {{ $lstCareer->position }}</a> </h6>
                                        </div>
                                        <div id="collapse{{ $i }}" class="acod-body collapse show" data-parent="#accordion001" style="">
                                            <div class="acod-content">
                                                <p>Skill Requirements : </p>
                                                {!! $lstCareer->job_desc !!}
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="panel">
                                        <div class="acod-head">
                                            <h6 class="acod-title"> <a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse{{ $i }}" class="collapsed" aria-expanded="false">{{ $i }}. {{ $lstCareer->position }}</a> </h6>
                                        </div>
                                        <div id="collapse{{ $i }}" class="acod-body collapse" data-parent="#accordion001">
                                            <div class="acod-content">
                                                <p>Skill Requirements : </p>
                                                {!! $lstCareer->job_desc !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @php $i=$i+1; @endphp
                                    @endforeach
                                </div>
                            </div>
                            <!-- Accordion Bg Primary END -->
                        </div>	
                    </div>	
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Form END -->