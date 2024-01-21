<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="Winkit is a multipurpose fully responsive template.Winkit is well designed to customize and to build a stunning business website.It contains different types of templates like Dating App, Landing, Travel.This template has a beautiful and unique design that will be best suited for your online business." />
	<meta property="og:title" content="Winkit - Multipurpose Responsive Template" />
	<meta property="og:description" content="Winkit is a multipurpose fully responsive template.Winkit is well designed to customize and to build a stunning business website.It contains different types of templates like Dating App, Landing, Travel.This template has a beautiful and unique design that will be best suited for your online business." />
	<meta property="og:image" content="http://winkit.dexignlab.com/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
	
	<!-- PAGE TITLE HERE -->
	<title>{{ $title . ' - ' . config('app.name') }}</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="{{ asset('frontend/js/html5shiv.min.js') }}"></script>
	<script src="{{ asset('frontend/js/respond.min.js') }}"></script>
	<![endif]-->
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('frontend/css/skin/skin-1.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/templete.css') }}">
	<!-- Revolution Slider Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/layers.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/revolution/revolution/css/settings.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/revolution/revolution/css/navigation.css') }}">
	<!-- Revolution Navigation Style -->
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-area"><h1 class="ml12">Loading</h1></div>
    <!-- header -->
    <header class="site-header header mo-left">
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="dlab-topbar-left">
						<ul>
							<li><i class="ti-email m-r5"></i> info@cybernault.com</li>
							<li><i class="ti-mobile m-r5"></i> +234 801 237 2372</li>
						</ul>
					</div>
					<div class="dlab-topbar-right topbar-social">
						<ul>
							<li><a href="#" class="site-button-link facebook hover"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="site-button-link google-plus hover"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="site-button-link twitter hover"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="site-button-link instagram hover"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#" class="site-button-link linkedin hover"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" class="site-button-link youtube hover"><i class="fa fa-youtube-play"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- main header -->
        <div class="sticky-header main-bar-wraper  navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
						<a href="index.html"><img src="{{ asset('images/logo.png') }}" alt=""></a>
					</div>
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
                    <!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <button id="quik-search-btn" type="button" class="site-button-link"><i class="fa fa-search"></i></button>
                            <div class="shop-cart navbar-right">
								<a class="site-button-link cart-btn" href="{{ route('cart') }}" style="color:#000;">
									<i class="fa fa-shopping-bag"></i><span class="badge bg-primary">3</span>
                                </a>
							</div>
                            {{--<button type="button" class="btn btn-dark rounded-0 ml-4">Login</button>--}}
						</div>
                    </div>
                    <!-- Quik search -->
                    <div class="dlab-quik-search bg-primary ">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span id="quik-search-remove"><i class="flaticon-close"></i></span>
                        </form>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">	
							<li class="has-mega-menu home-demo {{ $activePage == 'home' ? 'active' : '' }}"> <a href="{{ route('home') }}">Home</i></a></li>
							<li class="has-mega-menu home-demo {{ $activePage == 'products' ? 'active' : '' }}"> <a href="{{ route('products') }}">All Products</i></a></li>
							<li class="has-mega-menu home-demo {{ $activePage == 'about' ? 'active' : '' }}"> <a href="{{ route('about') }}">About Us</i></a></li>
							<li class="has-mega-menu home-demo {{ $activePage == 'contact' ? 'active' : '' }}"> <a href="{{ route('contact') }}">Contact</i></a></li>
							<li class="has-mega-menu home-demo {{ $activePage == 'faq' ? 'active' : '' }}"> <a href="{{ route('faq') }}">FAQs</i></a></li>
						</ul>		
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->

    <!-- Content -->
    @yield('content')
    <!-- Content END-->

    <!-- Footer -->
    <footer class="site-footer footer-white">
        <div class="footer-top">
            <div class="container">
                <div class="row">
					<div class="col-lg-5 col-md-12 col-sm-12 footer-col-4 ">
                        <div class="widget">
                            <h5 class="m-b30 text-white">Subscribe To Our Newsletter</h5>
							<p class="text-capitalize m-b20">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the..</p>
                            <div class="subscribe-form m-b20">
								<form class="dzSubscribe" action="script/mailchamp.php" method="post">
									<div class="dzSubscribeMsg"></div>
									<div class="input-group">
										<input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email"/>
										<span class="input-group-btn">
											<button name="submit" value="Submit" type="submit" class="site-button radius-xl">Subscribe</button>
										</span> 
									</div>
								</form>
							</div>
							<ul class="list-inline m-a0">
								<li><a href="#" class="site-button facebook circle "><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="site-button google-plus circle "><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="site-button linkedin circle "><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="site-button instagram circle "><i class="fa fa-instagram"></i></a></li>
								<li><a href="#" class="site-button twitter circle "><i class="fa fa-twitter"></i></a></li>
							</ul>
                        </div>
                    </div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-5 footer-col-4">
                        <div class="widget widget_services border-0">
                            <h5 class="m-b30 text-white">Company</h5>
                            <ul>
                                <li><a href="{{ route('home') }}">Home </a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                <li><a href="{{ route('faq') }}">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
					{{--<div class="col-lg-2 col-md-4 col-sm-6 col-7 footer-col-4">
                        <div class="widget widget_services border-0">
                            <h5 class="m-b30 text-white">Useful Link</h5>
                            <ul>
                                <li><a href="index.html">Create Account</a></li>
                                <li><a href="index.html">Company Philosophy </a></li>
                                <li><a href="contact.html">Corporate Culture</a></li>
                                <li><a href="about-1.html">Portfolio</a></li>
                                <li><a href="services-2.html">Client Management</a></li>
                            </ul>
                        </div>
                    </div>--}}
					<div class="col-lg-3 col-md-6 col-sm-6 footer-col-4">
                        <div class="widget widget_getintuch">
                            <h5 class="m-b30 text-white ">Contact us</h5>
                            <ul>
                                <li><i class="ti-location-pin"></i><strong>address</strong> Block P #26 Otigba Street, Computer Village, Ikeja Lagos. </li>
                                <li><i class="ti-mobile"></i><strong>phone</strong>0800-123456 (24/7 Support Line)</li>
								<li><i class="ti-email"></i><strong>email</strong>info@cybernault.com</li>
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
                    <div class="col-md-6 col-sm-6 text-left "> <span>Copyright © 2021 <a href="{{ config('app.url') }}" target="_blank">{{ config('app.name') }}</a>. All Rights Reserved.</span> </div>
                    <div class="col-md-6 col-sm-6 text-right "> 
						<div class="widget-link "> 
							<ul>
								<li><a href="#"> Help Desk</a></li> 
								<li><a href="#"> Privacy Policy</a></li> 
							</ul>
						</div>
					</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END-->
    <button class="scroltop fa fa-chevron-up" ></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
<script src="{{ asset('frontend/plugins/wow/wow.js') }}"></script><!-- WOW JS -->
<script src="{{ asset('frontend/plugins/bootstrap/js/popper.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ asset('frontend/plugins/bootstrap/js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ asset('frontend/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script><!-- FORM JS -->
<script src="{{ asset('frontend/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script><!-- FORM JS -->
<script src="{{ asset('frontend/plugins/magnific-popup/magnific-popup.js') }}"></script><!-- MAGNIFIC POPUP JS -->
<script src="{{ asset('frontend/plugins/counter/waypoints-min.js') }}"></script><!-- WAYPOINTS JS -->
<script src="{{ asset('frontend/plugins/counter/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
<script src="{{ asset('frontend/plugins/imagesloaded/imagesloaded.js') }}"></script><!-- IMAGESLOADED -->
<script src="{{ asset('frontend/plugins/masonry/masonry-3.1.4.js') }}"></script><!-- MASONRY -->
<script src="{{ asset('frontend/plugins/masonry/masonry.filter.js') }}"></script><!-- MASONRY -->
<script src="{{ asset('frontend/plugins/owl-carousel/owl.carousel.js') }}"></script><!-- OWL SLIDER -->
<script src="{{ asset('frontend/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{ asset('frontend/js/dz.carousel.js') }}"></script><!-- SORTCODE FUCTIONS  -->
<script src="{{ asset('frontend/plugins/loading/anime.js') }}"></script><!-- LOADING JS -->
<script src="{{ asset('frontend/plugins/loading/anime-app3.js') }}"></script><!-- LOADING JS -->
<script src="{{ asset('frontend/js/dz.ajax.js') }}"></script><!-- CONTACT JS  -->
<!-- revolution JS FILES -->
<script src="{{ asset('frontend/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{ asset('frontend/plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/revolution/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script>
var revapi265,
                tpj=jQuery;
            tpj(document).ready(function() {
        if(tpj("#rev_slider_265_1").revolution == undefined){
          revslider_showDoubleJqueryError("#rev_slider_265_1");
        }else{
          revapi265 = tpj("#rev_slider_265_1").show().revolution({
            sliderType:"standard",
            sliderLayout:"fullwidth",
            dottedOverlay:"none",
            delay:9000,
            navigation: {
              keyboardNavigation:"off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation:"off",
                             mouseScrollReverse:"default",
              onHoverStop:"off",
              touch:{
                touchenabled:"on",
                touchOnDesktop:"off",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
              }
              ,
              arrows: {
                style:"gyges",
                enable:true,
                hide_onmobile:true,
                hide_under:767,
                hide_onleave:false,
                tmp:'',
                left: {
                  h_align:"left",
                  v_align:"center",
                  h_offset:20,
                                    v_offset:0
                },
                right: {
                  h_align:"right",
                  v_align:"center",
                  h_offset:20,
                                    v_offset:0
                }
              }
            },
            visibilityLevels:[1240,1024,778,480],
            gridwidth:1920,
            gridheight:800,
            lazyType:"none",
            shadow:0,
            spinner:"spinner0",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            disableProgressBar:"on",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            debugMode:false,
            fallbacks: {
              simplifyAll:"off",
              nextSlideOnWindowFocus:"off",
              disableFocusListener:false,
            }
          });
        }
      });
</script>


 

</body>
</html>