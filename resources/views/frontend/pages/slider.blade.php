<div id="welcome" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.7.2">
    <ul>
        @php $indexSlide = 100; @endphp
        @foreach ($slides as $imgSlide)
        <li data-index="rs-{{ $indexSlide }}" data-transition="slideoververtical" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
            <!-- MAIN IMAGE -->
            <img src="{{ asset('images/main-slider/'.$imgSlide->banner_image) }}"  alt=""  data-lazyload="{{ asset('images/main-slider/'.$imgSlide->banner_image) }}" data-bgposition="center center" data-kenburns="on" data-duration="4000" data-ease="Power3.easeInOut" data-scalestart="150" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="-100 0" data-offsetend="-100 0" data-bgparallax="4" class="rev-slidebg" data-no-retina>
            <!-- LAYER NR. 1 -->
            <div class="tp-caption tp-shape tp-shapewrapper ov-tp " 
                id="slide-{{ $indexSlide }}-layer-1" 
                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                data-width="full"
                data-height="full"
                data-whitespace="nowrap"
                data-type="shape" 
                data-basealign="slide" 
                data-responsive_offset="off" 
                data-responsive="off"
                data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]'
                data-textAlign="['inherit','inherit','inherit','inherit']"
                data-paddingtop="[0,0,0,0]"
                data-paddingright="[0,0,0,0]"
                data-paddingbottom="[0,0,0,0]"
                data-paddingleft="[0,0,0,0]"
                style="z-index: 5;">
            </div>
            <div class="tp-caption " 
                id="slide-{{ $indexSlide }}-layer-2" 
                data-x="['center','center','center','center']" data-hoffset="['-90','-300','0','0']" 
                data-y="['middle','middle','middle','middle']" data-voffset="['-30','-55','-50','-70']" 
                data-fontsize="['65','50','40','30']"
                data-lineheight="['75','60','50','40']"
                data-letterspacing="['3','2','2','2']"
                data-width="['1000','none','768','360']"
                data-height="none"
                data-whitespace="['normal','nowrap','normal','normal']"
                data-type="text" 
                data-responsive_offset="off" 
                data-responsive="off"
                data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
                data-textAlign="['left','left','center','center']"
                data-paddingtop="[0,0,0,0]"
                data-paddingright="[10,10,0,0]"
                data-paddingbottom="[0,0,0,0]"
                data-paddingleft="[0,0,0,0]"
                style="z-index: 6; min-width: 800px; max-width: 800px; font-weight: 900; white-space: normal; color: #fff; font-family:  'Roboto Condensed', sans-serif;">           
                {!! $imgSlide->banner_subtitle !!} <br/>{!! $imgSlide->banner_title !!}
            </div>
            <!-- LAYER NR. 3 -->
            <div class="tp-caption" 
                id="slide-{{ $indexSlide }}-layer-3" 
                data-x="['center','center','center','center']" data-hoffset="['-265','-170','0','0']" 
                data-y="['middle','middle','middle','middle']" data-voffset="['100','55','50','30']" 
                data-fontsize="['16','16','15','14']"
                data-lineheight="['30','30','25','22']"
                data-width="['630','550','500','300']"
                data-height="none"
                data-whitespace="normal"
                data-type="text" 
                data-responsive_offset="off" 
                data-responsive="off"
                data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
                data-textAlign="['left','left','center','center']"
                data-paddingtop="[0,0,0,0]"
                data-paddingright="[0,0,0,0]"
                data-paddingbottom="[0,0,0,0]"
                data-paddingleft="[0,0,0,0]"
                style="z-index: 7; min-width: 640px; max-width: 640px; font-weight: 700; font-size: 18px; line-height: 30px; font-weight: 400; color: #fff; font-family: 'Poppins',sans-serif;">{!! $imgSlide->banner_description !!}
            </div>
        </li>
        @php $indexSlide = $indexSlide+100; @endphp
        @endforeach
    </ul>
    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div> 
</div>