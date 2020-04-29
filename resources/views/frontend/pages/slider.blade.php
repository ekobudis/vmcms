<div id="rev_slider_1061_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
    <ul>
        @php $indexSlide = 100; @endphp
        @foreach ($slides as $imgSlide)
        <li data-index="rs-{{ $indexSlide }}" 
            data-transition="fadethroughdark" 
            data-slotamount="default" 
            data-hideafterloop="0" 
            data-hideslideonmobile="off"  
            data-easein="default" 
            data-easeout="default" 
            data-masterspeed="2000" 
            data-thumb="{{ asset('images/main-slider/'.$imgSlide->banner_image) }}"  
            data-rotate="0"  
            data-saveperformance="off"  
            data-title="Creative" 
            data-param1="01" 
            data-param2="" data-param3="" 
            data-param4="" 
            data-param5="" 
            data-param6="" 
            data-param7="" 
            data-param8="" 
            data-param9="" 
            data-param10="" 
            data-description="">
            <!-- MAIN IMAGE -->
            <img src="{{ asset('images/main-slider/'.$imgSlide->banner_image) }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgparallax="3" class="rev-slidebg" data-no-retina>
            <!-- LAYERS -->
            
            <!-- LAYER NR. 1 -->
            <div class="tp-caption tp-shape tp-shapewrapper rs-parallaxlevel-tobggroup" 
                id="slide-{{ $indexSlide }}-layer-1" 
                data-x="['center','center','center','center']" 
                data-hoffset="['0','0','0','0']" 
                data-y="['middle','middle','middle','middle']" 
                data-voffset="['0','0','0','0']" 
                data-fontweight="['100','100','400','400']"
                data-width="full"
                data-height="full"
                data-whitespace="nowrap"
                data-type="shape" 
                data-basealign="slide" 
                data-responsive_offset="off" 
                data-responsive="off"
                data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]'
                data-textAlign="['left','left','left','left']"
                data-paddingtop="[0,0,0,0]"
                data-paddingright="[0,0,0,0]"
                data-paddingbottom="[0,0,0,0]"
                data-paddingleft="[0,0,0,0]"
                style="z-index: 5; background-color:rgba(18, 12, 20, 0.5);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
            </div>

            <!-- LAYER NR. 2 -->
            <div class="tp-caption tp-shape tp-shapewrapper bg-primary rs-parallaxlevel-3" 
                id="slide-{{ $indexSlide }}-layer-2" 
                data-x="['center','center','center','center']"
                data-hoffset="['0','0','0','0']" 
                data-y="['middle','middle','middle','middle']" 
                data-voffset="['-150','-178','-120','-141']" 
                data-width="5"
                data-height="100"
                data-whitespace="nowrap"
                data-type="shape" 
                data-responsive_offset="on" 
                data-responsive="off"
                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                data-textAlign="['left','left','left','left']"
                data-paddingtop="[0,0,0,0]"
                data-paddingright="[0,0,0,0]"
                data-paddingbottom="[0,0,0,0]"
                data-paddingleft="[0,0,0,0]"
                style="z-index: 6;border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
            </div>
            <!-- LAYER NR. 3 -->
            <div class="tp-caption Creative-SubTitle tp-resizeme rs-parallaxlevel-2 text-primary" 
                id="slide-{{ $indexSlide }}-layer-3" 
                data-x="['center','center','center','center']" 
                data-hoffset="['0','0','0','0']" 
                data-y="['middle','middle','middle','middle']" 
                data-voffset="['-60','-91','-20','-30']" 
                data-fontsize="['14','14','14','14']"
                data-lineheight="['14','14','14','14']"
                data-width="none"
                data-height="none"
                data-whitespace="nowrap"
                data-type="text" 
                data-responsive_offset="on" 
                data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
                data-textAlign="['center','center','center','center']"
                data-paddingtop="[0,0,0,0]"
                data-paddingright="[0,0,0,0]"
                data-paddingbottom="[0,0,0,0]"
                data-paddingleft="[0,0,0,0]"
                style="z-index: 7; white-space: nowrap; font-family: 'Roboto Condensed', sans-serif;">{!! $imgSlide->banner_subtitle !!}
            </div>
            <!-- LAYER NR. 4 -->
            <div class="tp-caption Creative-Title tp-resizeme rs-parallaxlevel-1" 
                id="slide-{{ $indexSlide }}-layer-4" 
                data-x="['center','center','center','center']" 
                data-hoffset="['0','0','0','0']" 
                data-y="['middle','middle','middle','middle']"
                data-voffset="['40','-10','60','40']" 
                data-fontsize="['70','70','50','40']"
                data-lineheight="['70','70','55','45']"
                data-width="['none','none','none','320']"
                data-height="none"
                data-whitespace="nowrap"
                data-type="text" 
                data-responsive_offset="on" 
                data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
                data-textAlign="['center','center','center','center']"
                data-paddingtop="[0,0,0,0]"
                data-paddingright="[0,0,0,0]"
                data-paddingbottom="[0,0,0,0]"
                data-paddingleft="[0,0,0,0]"
                style="z-index: 8; white-space: nowrap; font-family: 'Roboto Condensed', sans-serif;">
                {!! $imgSlide->banner_title !!}
            </div>
            <!-- LAYER NR. 5 -->
            <div class="tp-caption tp-shape tp-shapewrapper bg-primary rs-parallaxlevel-3" 
                id="slide-{{ $indexSlide }}-layer-5" 
                data-x="['center','center','center','center']" 
                data-hoffset="['0','0','0','0']" 
                data-y="['middle','middle','middle','middle']" 
                data-voffset="['200','137','210','180']" 
                data-width="5"
                data-height="100"
                data-whitespace="nowrap"
                data-type="shape" 
                data-responsive_offset="on" 
                data-responsive="off"
                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                data-textAlign="['left','left','left','left']"
                data-paddingtop="[0,0,0,0]"
                data-paddingright="[0,0,0,0]"
                data-paddingbottom="[0,0,0,0]"
                data-paddingleft="[0,0,0,0]"
                style="z-index: 9; border-color:rgba(0, 0, 0, 0);border-width:0px;">
            </div>
            <!-- LAYER NR. 6 -->
            <div class="tp-caption Creative-Button rev-btn text-primary rs-parallaxlevel-15"
                id="slide-{{ $indexSlide }}-layer-6" 
                data-x="['center','center','center','center']" 
                data-hoffset="['0','0','0','0']" 
                data-y="['top','top','top','top']" 
                data-voffset="['720','611','800','650']" 
                data-fontweight="['400','500','500','500']"
                data-width="none"
                data-height="none"
                data-whitespace="nowrap"
                data-type="button" 
                data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                data-responsive_offset="on" 
                data-responsive="off"
                data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3850,"ease":"Power2.easeOut"},{"delay":"wait","speed":500,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","ease":"Power1.easeIn"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:#e87800;bc:#e87800;bw:1px 1px 1px 1px;"}]'
                data-textAlign="['left','left','left','left']"
                data-paddingtop="[15,15,15,15]"
                data-paddingright="[50,50,50,30]"
                data-paddingbottom="[15,15,15,15]"
                data-paddingleft="[50,50,50,30]"
                style="z-index: 10; white-space: nowrap; outline:none; box-shadow:none; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; cursor:pointer;font-family: 'Roboto Condensed', sans-serif; border-color: var(--color-primary);">CONTINUE THE JOURNEY 
            </div>
        </li>
        @php $indexSlide = $indexSlide+100; @endphp
        @endforeach
    </ul>
    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div> 
</div>