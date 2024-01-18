@extends('layouts.app', ['title' => 'Get In Touch', 'activePage' => 'contact'])

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-middle bg-pt p-t100" style="background-image:url({{ asset('frontend/images/slider/slide3.jpg') }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry align-m text-center">
                <h1 class="text-white">Contact Us</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Contact Info -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="icon-bx-wraper bx-style-1 p-a20 center">
                        <div class="icon-xl text-primary m-b20"> <a href="#" class="icon-cell"><i class="ti-location-pin"></i></a> </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte text-uppercase">Address</h5>
                            <p>Block P #26 Otigba Street, Computer Village, Ikeja Lagos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="icon-bx-wraper bx-style-1 p-a20 center">
                        <div class="icon-xl text-primary m-b20"> <a href="#" class="icon-cell"><i class="ti-email"></i></a> </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte text-uppercase">Email</h5>
                            <p>info@cybernault.com <br> cybernaultnigeria@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="icon-bx-wraper bx-style-1 p-a20 center">
                        <div class="icon-xl text-primary m-b20"> <a href="#" class="icon-cell"><i class="ti-mobile"></i></a> </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte text-uppercase">Phone</h5>
                            <p>0800-123456 (24/7 Support Line) <br> +234 803 456 7890</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="icon-bx-wraper bx-style-1 p-a20 center">
                        <div class="icon-xl text-primary m-b20"> <a href="#" class="icon-cell"><i class="ti-printer"></i></a> </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte text-uppercase">Open Hours</h5>
                            <p>MON-FRI : 8AM - 6PM <br> SAT : 9AM - 4PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info END -->
    <!-- contact area -->
    <div class="section-full bg-white">
        <div class="row">
            <div class="col-lg-12 col-md-12 p-a0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15853.574623514878!2d3.334495097708373!3d6.597901044333353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b939eaf127915%3A0x5e8d76fccd8dc6d1!2sComputer%20village!5e0!3m2!1sen!2sng!4v1705582236823!5m2!1sen!2sng" style="border:0; margin-bottom: -5px; height: 400px; width:100%;" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- contact area END -->
    <!-- Content us -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="section-head text-black text-center">
                <h3 class="h2 text-uppercase font-weight-700">Contact Us</h3>
                <div class="dlab-separator bg-primary"></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
            </div>
            <div class="row max-w1000 m-auto">
                <div class="col-lg-12">
                    <div class="contact-page-6 p-a30 clearfix form-box1">
                        <div class="dzFormMsg"></div>
                        <form method="post" class="dzForm" action="script/contact.php">
                        <input type="hidden" value="Contact" name="dzToDo">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="dzName" type="text" required class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group"> 
                                            <input name="dzEmail" type="email" class="form-control" required  placeholder="Your Email Id" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="dzOther[Phone]" type="text" required class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="dzOther[Subject]" type="text" required class="form-control" placeholder="Subject">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="dzMessage" rows="4" class="form-control" required placeholder="Your Message..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="g-recaptcha" data-sitekey="<!-- Put reCaptcha Site Key -->" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                            <input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <button name="submit" type="submit" value="Submit" class="site-button outline outline-2 radius-xl button-md"> <span>Submit</span> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content us END -->
</div>
@endsection