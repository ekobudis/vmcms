<!-- Portfolio  -->
<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/bnr1.jpg);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
        </div>
    </div>
</div>
<div class="section-full content-inner-2 portfolio text-uppercase bg-gray" id="portfolio">
    <div class="container">
        <div class="site-filters clearfix center  m-b40">
            <ul class="filters" data-toggle="buttons">
                <li data-filter="" class="btn active">
                    <input type="radio">
                    <a href="javascript:void(0);" class="site-button-secondry button-sm radius-xl"><span>All</span></a> 
                </li>
                @foreach ($categorys as $itemServ)
                <li data-filter="{{ $itemServ->slug }}" class="btn">
                    <input type="radio">
                    <a href="javascript:void(0);" class="site-button-secondry button-sm radius-xl"><span>{{ $itemServ->name }}</span></a> 
                </li> 
                @endforeach
            </ul>
        </div>
        <div class="clearfix" id="lightgallery">
            <ul id="masonry" class="portfolio-ic dlab-gallery-listing gallery-grid-4 gallery row p-l0 sp10 lightgallery text-center">
                <li class="web design card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect">
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_1.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon"> 
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_1.jpg" data-src="images/portfolio/image_1.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">Muchen Railway Station</a></p>
                            <p><small>System</small></p>
                        </div>
                    </div>
                </li>
                <li class="advertising branding photography card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect dlab-img-effect "> 
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_2.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon">
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_2.jpg" data-src="images/portfolio/image_2.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">sanfran cisco bridge</a></p>
                            <p><small>Engineering</small></p>
                        </div>
                    </div>
                </li>
                <li class="branding design photography card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect"> 
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_3.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon">
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_3.jpg" data-src="images/portfolio/image_3.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">berlin central bank</a></p>
                            <p><small>Bank / Constructions</small></p>
                        </div>
                    </div>
                </li>
                <li class="web design card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect"> 
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_4.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon">
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_4.jpg" data-src="images/portfolio/image_4.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">Capturing Manila</a></p>
                            <p><small>industry</small></p>
                        </div>
                    </div>
                </li>
                 <li class="web branding card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect">
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_5.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon">
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_5.jpg" data-src="images/portfolio/image_5.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">hamburg wind energy plant</a></p>
                            <p><small>industry</small></p>
                        </div>
                    </div>
                </li>
                <li class="advertising design photography card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect ">
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_6.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon">
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_6.jpg" data-src="images/portfolio/image_6.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">Crop Identity</a></p>
                            <p><small>Branding and Identity</small></p>
                        </div>
                    </div>
                </li>
                <li class="web branding card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect">
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_7.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon"> 
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_7.jpg" data-src="images/portfolio/image_7.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">berlin central bank</a></p>
                            <p><small>Bank / Constructions</small></p>
                        </div>
                    </div>
                </li>
                <li class="advertising design photography card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect dlab-img-effect "> 
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_8.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon">
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_8.jpg" data-src="images/portfolio/image_8.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">hamburg wind energy plant</a></p>
                            <p><small>Energy</small></p>
                        </div>
                    </div>
                </li>
                <li class="web photography card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect"> 
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_9.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon">
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_9.jpg" data-src="images/portfolio/image_9.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">sanfran cisco bridge</a></p>
                            <p><small>Engineering</small></p>
                        </div>
                    </div>
                </li>
                <li class="advertising branding card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect"> 
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_10.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon">
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_10.jpg" data-src="images/portfolio/image_10.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">Mining Plant Set Up</a></p>
                            <p><small>Mining / Plants</small></p>
                        </div>
                    </div>
                </li>
                 <li class="web design card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect">
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_11.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon">
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_11.jpg" data-src="images/portfolio/image_11.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">sanfran cisco bridge</a></p>
                            <p><small>Engineering</small></p>
                        </div>
                    </div>
                </li>
                <li class="advertising branding photography card-container col-lg-4 col-md-6 col-sm-6 p-a0">
                    <div class="dlab-box dlab-gallery-box">
                        <div class="dlab-media dlab-img-overlay1 dlab-img-effect ">
                            <a href="portfolio-details.html"> <img src="images/portfolio/image_12.jpg"  alt=""> </a>
                            <div class="overlay-bx">
                                <div class="overlay-icon">
                                    <div class="text-white">
                                        <a href="portfolio-details.html"><i class="fa fa-link icon-bx-xs"></i></a> 
                                        <span data-exthumbimage="images/portfolio/image_12.jpg" data-src="images/portfolio/image_12.jpg" class="check-km" title="Factory Managment">		
                                            <i class="fa fa-picture-o icon-bx-xs"></i> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dez-info p-a30 bg-white">
                            <p class="dez-title m-t0"><a href="portfolio-details.html">Capturing Manila</a></p>
                            <p><small>industry</small></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>