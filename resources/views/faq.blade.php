@extends('layouts.app', ['title' => 'Frequently Asked Questions', 'activePage' => 'faq'])

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-middle bg-pt p-t100" style="background-image:url({{ asset('frontend/images/slider/slide3.jpg') }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry align-m text-center">
                <h1 class="text-white">Frequently Asked Questions</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>FAQs</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Your Faq -->
        <div class="section-full overlay-white-middle content-inner" style="background-image:url(images/pattern/pic1.jpg);">
            <div class="container">
                <div class="section-head text-black text-center">
                    <h3 class="h2 text-uppercase font-weight-700">Do you have Questions?</h3>
                    <div class="dlab-separator bg-primary"></div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 m-b30"> 
                        <div class="faq-video">
                            <a class="play-btn popup-youtube" href="https://www.youtube.com/embed/6lt2JfJdGSY">
                            <i class="flaticon-play-button text-white"></i></a>
                            <img src="images/about/pic5.jpg" alt="" class="img-cover radius-sm"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 m-b30">
                        <div class="dlab-accordion faq-1 box-sort-in m-b30" id="accordion1">
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> 
                                        <a href="#" data-toggle="collapse" data-target="#faq1" class="collapsed" aria-expanded="true">
                                        1. Web design aorem apsum dolor sit amet?</a> </h6>
                                </div>
                                <div id="faq1" class="acod-body collapse" data-parent="#accordion1">
                                    <div class="acod-content">Web design aorem apsum dolor sit amet, adipiscing elit, sed diam nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> 
                                        <a href="#" data-toggle="collapse" data-target="#faq2" class="collapsed" aria-expanded="false">
                                        2. Graphic design aorem apsum dolor ?</a> </h6>
                                </div>
                                <div id="faq2" class="acod-body collapse" data-parent="#accordion1">
                                    <div class="acod-content">Graphic design aorem apsum dolor sit amet, adipiscing elit, sed diam nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> 
                                        <a href="#" data-toggle="collapse"  data-target="#faq3" class="collapsed" aria-expanded="false">
                                        3. Developement aorem apsum dolor sit amet ? </a> </h6>
                                </div>
                                <div id="faq3" class="acod-body collapse"  data-parent="#accordion1">
                                    <div class="acod-content">Developement aorem apsum dolor sit amet, adipiscing elit, sed diam nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> 
                                        <a href="#" data-toggle="collapse"  data-target="#faq4" class="collapsed" aria-expanded="false">
                                        4. True Responsiveness consectetuer adipiscing ? </a> </h6>
                                </div>
                                <div id="faq4" class="acod-body collapse" data-parent="#accordion1">
                                    <div class="acod-content">Developement aorem apsum dolor sit amet, adipiscing elit, sed diam nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> 
                                        <a href="#" data-toggle="collapse"  data-target="#faq5" class="collapsed" aria-expanded="false">
                                        5. Claritas est etiam processus ?</a> </h6>
                                </div>
                                <div id="faq5" class="acod-body collapse" data-parent="#accordion1">
                                    <div class="acod-content">Developement aorem apsum dolor sit amet, adipiscing elit, sed diam nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Faq Info -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 m-b30">
                        <div class="icon-bx-wraper bx-style-1 bg-white p-a30 left">
                            <div class="icon-md text-primary m-b20"> 
                                <a href="#" class="icon-cell"><i class="flaticon-bar-chart"></i></a> 
                            </div>
                            <div class="icon-content">
                                <h5 class="dlab-tilte text-uppercase">Make it Simple</h5>
                                <p>Web design aorem apsum dolor  dolore magna aliquam erat volutpat.Claritas est etiam processus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 m-b30">
                        <div class="icon-bx-wraper bx-style-1 bg-white p-a30 left">
                            <div class="icon-md text-primary m-b20"> 
                                <a href="#" class="icon-cell"><i class="flaticon-trophy"></i></a> 
                            </div>
                            <div class="icon-content">
                                <h5 class="dlab-tilte text-uppercase">Unique design</h5>
                                <p>Web design aorem apsum dolor  dolore magna aliquam erat volutpat.Claritas est etiam processus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 m-b30">
                        <div class="icon-bx-wraper bx-style-1 bg-white p-a30 left">
                            <div class="icon-md text-primary m-b20"> 
                                <a href="#" class="icon-cell"><i class="flaticon-devices"></i></a> 
                            </div>
                            <div class="icon-content">
                                <h5 class="dlab-tilte text-uppercase">True Responsiveness</h5>
                                <p>Web design aorem apsum dolor  dolore magna aliquam erat volutpat.Claritas est etiam processus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Faq Info END -->
            </div>
        </div>
        <!-- Your Faq End -->
    </div>
    <!-- contact area END -->
</div>
@endsection