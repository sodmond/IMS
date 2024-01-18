@extends('layouts.app', ['title' => 'About Us', 'activePage' => 'about'])

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-middle bg-pt p-t100" style="background-image:url({{ asset('frontend/images/slider/slide3.jpg') }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry align-m text-center">
                <h1 class="text-white">About Us</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Info -->
        <div class="section-full p-t50">
            <div class="container">
                <div class="row m-t20">
                    <div class="col-lg-6 col-md-6 m-b30">
                        <h3 class="title-box m-a0 border-1 p-a20 radius-sm br-col-b1">We provide high quality and cost effective services <span class="bg-primary"></span></h3>
                    </div>
                    <div class="col-lg-6 col-md-6 m-b30">
                        <p class="m-a0 font-16">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble…</p>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Info END -->
        <div class="container m-b30">
            <div class="dlab-divider bg-gray-dark"><i class="icon-dot c-square"></i></div>
        </div>
        <!-- Abouts -->
        <div class="section-full bg-white p-b50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 m-b30 img-full"><img src="images/about/pic4.jpg" class="radius-sm" alt=""></div>
                    <div class="col-lg-7 col-md-12 m-b30">
                        <h2 class="m-t0 title-box">Company Overview <span class="bg-primary"></span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui official. </p>
                        <!-- Counter -->
                        <ul class="counter-box border-1 br-col-b1 clearfix m-a0">
                            <li>
                                <div class="counting text-blue-light">
                                    <span class="counter">10</span> +
                                </div>
                                <span class="counter-text">Years of Experience</span>
                            </li>
                            <li>
                                <div class="counting text-blue-light">
                                    <span class="counter">95</span> +
                                </div>
                                <span class="counter-text">Happy Customers</span>
                            </li>
                            <li>
                                <div class="counting text-blue-light">
                                    <span class="counter">100</span> %
                                </div>
                                <span class="counter-text">Satisfaction</span>
                            </li>
                        </ul>
                        <!-- Counter -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Abouts END -->
        <!-- Abouts -->
        <div class="section-full bg-img-fix bg-white content-inner-2 overlay-black-middle" style="background-image: url(images/background/bg1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <div class="bg-gray p-a30 radius-sm">
                            <h2 class="font-weight-700 title-box text-primary m-t0">Creativity Takes Courage and Determination</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui.</p>
                            <a href="#" class="site-button radius-xl outline-2 outline">CONTACT US NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Abouts END -->
        <!-- We Are -->
        <div class="section-full content-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 img-full m-b30 d-none d-lg-block">
                        <img src="images/about/pic2.jpg" class="radius-sm" alt="">
                    </div>
                    <div class="col-lg-8 col-md-12 m-b30">
                        <h5 class="text-gray-dark font-weight-300">WHO WE ARE</h5>
                        <h3 class="font-weight-300">We would love to hear about start your new project?</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui.</p>
                        <h3 class="text-gray-dark h3 text-uppercase">Why Choose Us ?</h3>
                        <div class="widget widget_services about-2 margin-auto border-0">
                            <ul>
                                <li><a href="#">Lorem Ipsum is simply dummy text of the printing</a></li>
                                <li><a href="#">standard dummy text ever since the 1500s</a></li>
                                <li><a href="#">but also the leap into electronic typesetting</a></li>
                                <li><a href="#">software like Aldus PageMaker including versions</a></li>
                                <li><a href="#">Lorem Ipsum is simply dummy text of the printing</a></li>
                                <li><a href="#">standard dummy text ever since the 1500s</a></li>
                                <li><a href="#">but also the leap into electronic typesetting</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- We Are END -->
    </div>
    <!-- contact area END -->
</div>
@endsection