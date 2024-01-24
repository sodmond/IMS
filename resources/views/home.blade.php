@extends('layouts.app', ['title' => 'Home', 'activePage' => 'home'])

@section('content')
<div class="page-content bg-white">
    <div class="rev-slider">
        <div id="rev_slider_265_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container errow-style-1" data-alias="" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.6.3 fullwidth mode -->
        <div id="rev_slider_265_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6.3">
            <ul>  <!-- SLIDE  -->
                <li data-index="rs-100" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="{{ asset('frontend/images/slider/slide2.jpg') }}" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('frontend/images/slider/slide1.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption   tp-resizeme" 
                        id="slide-100-layer-2" 
                        data-x="510" 
                        data-y="190" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":1120,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 6; white-space: nowrap; font-size: 30px; line-height: 62px; font-weight: 700; color: #000; letter-spacing: 0px;font-family:Poppins;text-transform:uppercase;">
                            CLEARANCE
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme text-primary" 
                        id="slide-100-layer-3" 
                        data-x="389" 
                        data-y="250" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":2000,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['center','center','center','center']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 7; white-space: nowrap; font-size: 90px; line-height: 92px; font-weight: 800; letter-spacing: 0px;font-family:Montserrat;text-transform:uppercase;">
                            SALES <br/> 70% OFF
                    </div>
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption tp-resizeme" 
                        id="slide-100-layer-4" 
                        data-x="390" 
                        data-y="445" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":3000,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 8; white-space: nowrap; font-size: 16px; line-height: 36px; font-weight: 500; color: #000; letter-spacing: 0px;font-family:Poppins;">Last chance to take advantage of our discounts!
                    </div>
                    <!-- LAYER NR. 6 -->
                    <a class="tp-caption rev-btn  tp-resizeme" 
                        href="#" target="_self"       
                        id="slide-100-layer-6" 
                        data-x="500" 
                        data-y="500" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="button" 
                        data-actions=''
                        data-responsive_offset="on" 
                        data-frames='[{"delay":4000,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power0.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0,0,0,1);bg:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[12,12,12,12]"
                        data-paddingright="[35,35,35,35]"
                        data-paddingbottom="[12,12,12,12]"
                        data-paddingleft="[35,35,35,35]"
                        style="z-index: 10; white-space: nowrap; font-size: 16px; line-height: 30px; font-weight: 600; color: #0a0a0a; font-family:Montserrat;text-transform:uppercase;background-color:rgb(255,255,255);border-color:rgba(0,0,0,1);border-radius:3px 3px 3px 3px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">	Shop Now
                    </a>
                </li>
                <li data-index="rs-200" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="{{ asset('frontend/images/slider/slide2.jpg') }}" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('frontend/images/slider/slide2.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption   tp-resizeme" 
                        id="slide-200-layer-2" 
                        data-x="1310" 
                        data-y="190" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":1120,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 6; white-space: nowrap; font-size: 30px; line-height: 62px; font-weight: 700; color: #000; letter-spacing: 0px;font-family:Poppins;text-transform:uppercase;">
                            CLEARANCE
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme text-primary" 
                        id="slide-200-layer-3" 
                        data-x="1189" 
                        data-y="250" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":2000,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['center','center','center','center']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 7; white-space: nowrap; font-size: 90px; line-height: 92px; font-weight: 800; letter-spacing: 0px;font-family:Montserrat;text-transform:uppercase;">
                            SALES <br/> 70% OFF
                    </div>
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption tp-resizeme" 
                        id="slide-200-layer-4" 
                        data-x="1190" 
                        data-y="445" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":3000,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 8; white-space: nowrap; font-size: 16px; line-height: 36px; font-weight: 500; color: #000; letter-spacing: 0px;font-family:Poppins;">Last chance to take advantage of our discounts!
                    </div>
                    <!-- LAYER NR. 6 -->
                    <a class="tp-caption rev-btn  tp-resizeme" 
                        href="#" target="_self"       
                        id="slide-200-layer-6" 
                        data-x="1300" 
                        data-y="500" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="button" 
                        data-actions=''
                        data-responsive_offset="on" 
                        data-frames='[{"delay":4000,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power0.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0,0,0,1);bg:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[12,12,12,12]"
                        data-paddingright="[35,35,35,35]"
                        data-paddingbottom="[12,12,12,12]"
                        data-paddingleft="[35,35,35,35]"
                        style="z-index: 10; white-space: nowrap; font-size: 16px; line-height: 30px; font-weight: 600; color: #0a0a0a; font-family:Montserrat;text-transform:uppercase;background-color:rgb(255,255,255);border-color:rgba(0,0,0,1);border-radius:3px 3px 3px 3px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">	Shop Now
                    </a>
                </li>
                <li data-index="rs-200" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="{{ asset('frontend/images/slider/slide3.jpg') }}" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('frontend/images/slider/slide3.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption   tp-resizeme" 
                        id="slide-200-layer-2" 
                        data-x="1310" 
                        data-y="190" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":1120,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 6; white-space: nowrap; font-size: 30px; line-height: 62px; font-weight: 700; color: #000; letter-spacing: 0px;font-family:Poppins;text-transform:uppercase;">
                            CLEARANCE
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme text-primary" 
                        id="slide-200-layer-3" 
                        data-x="1189" 
                        data-y="250" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":2000,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['center','center','center','center']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 7; white-space: nowrap; font-size: 90px; line-height: 92px; font-weight: 800; letter-spacing: 0px;font-family:Montserrat;text-transform:uppercase;">
                            SALES <br/> 70% OFF
                    </div>
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption tp-resizeme" 
                        id="slide-200-layer-4" 
                        data-x="1190" 
                        data-y="445" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":3000,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 8; white-space: nowrap; font-size: 16px; line-height: 36px; font-weight: 500; color: #000; letter-spacing: 0px;font-family:Poppins;">Last chance to take advantage of our discounts!
                    </div>
                    <!-- LAYER NR. 6 -->
                    <a class="tp-caption rev-btn  tp-resizeme" 
                        href="#" target="_self"       
                        id="slide-200-layer-6" 
                        data-x="1300" 
                        data-y="500" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-type="button" 
                        data-actions=''
                        data-responsive_offset="on" 
                        data-frames='[{"delay":4000,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power0.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0,0,0,1);bg:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[12,12,12,12]"
                        data-paddingright="[35,35,35,35]"
                        data-paddingbottom="[12,12,12,12]"
                        data-paddingleft="[35,35,35,35]"
                        style="z-index: 10; white-space: nowrap; font-size: 16px; line-height: 30px; font-weight: 600; color: #0a0a0a; font-family:Montserrat;text-transform:uppercase;background-color:rgb(255,255,255);border-color:rgba(0,0,0,1);border-radius:3px 3px 3px 3px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">	Shop Now
                    </a>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div> </div>
        </div>  
    </div>  
    <!-- contact area -->
    {{--<div class="section-full p-tb20">
        <div class="container-fluid p-lr10">
            <div class="row sp20">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="item-add m-b20 add-style-3">
                        <img src="images/product/human/pic1.jpg" alt="">
                        <div class="add-box">
                            <div class="m-auto add-box-in text-black">
                                <h5 class="m-a0">Printers</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="item-add m-b20 add-style-3">
                        <img src="images/product/human/pic2.jpg" alt="">
                        <div class="add-box">
                            <div class="m-auto add-box-in text-black">
                                <h5 class="m-a0">Inks</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="item-add m-b20 add-style-3">
                        <img src="images/product/human/pic3.jpg" alt="">
                        <div class="add-box">
                            <div class="m-auto add-box-in text-black">
                                <h5 class="m-a0">CHILD</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="item-add m-b20 add-style-3">
                        <img src="images/product/human/pic4.jpg" alt="">
                        <div class="add-box">
                            <div class="m-auto add-box-in text-black">
                                <h5 class="m-a0">SHOP</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <div class="section-full content-inner">
        <div class="container">
            <div class="section-head text-black text-center">
                <h2 class="h2 text-uppercase font-weight-700">FEATURED PRODUCTS</h2>
                <h5 class="font-weight-400">POPULAR IN THE MARKET</h5>
            </div>
            <div class="row m-b30">
                <div class="col-lg-12">
                    <div class="img-carousel-content owl-carousel owl-btn-center-lr owl-btn-1 primary">
                        @foreach ($products as $product)
                        @php $slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $product->title))); @endphp
                        <div class="item">
                            <div class="item-box">
                                <div class="item-img">
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="">
                                    <div class="item-info-in">
                                        <ul>
                                            <li><a href="#" title="Add to Cart"><i class="ti-shopping-cart"></i></a></li>
                                            <li><a href="{{ route('product', ['id'=>$product->id, 'slug'=>$slug]) }}" title="View Product"><i class="ti-eye"></i></a></li>
                                            {{--<li><a href="#"><i class="ti-heart"></i></a></li>--}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="item-info text-center text-black p-a10">
                                    <h6 class="item-title text-uppercase font-weight-500"><a href="{{ route('product', ['id'=>$product->id, 'slug'=>$slug]) }}">{{ strtoupper($product->title) }}</a></h6>
                                    <ul class="item-review">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <h4 class="item-price">{{--<del>₦232</del>--}} <span class="text-primary">₦{{ number_format($product->price, 2) }}</span></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="img-carousel-content owl-carousel owl-btn-center-lr owl-btn-1 primary">
                        @foreach ($products as $product)
                        @php $slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $product->title))); @endphp
                        <div class="item">
                            <div class="item-box">
                                <div class="item-img">
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="">
                                    <div class="item-info-in">
                                        <ul>
                                            <li>
                                                <form action="{{ route('cart.add') }}" method="POST" id="{{ 'productForm'.$product->id }}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <a href="#" title="Add to Cart" onclick="event.preventDefault(); document.forms.{{'productForm'.$product->id}}.submit();"><i class="ti-shopping-cart"></i></a>
                                                </form>
                                            </li>
                                            <li><a href="{{ route('product', ['id'=>$product->id, 'slug'=>$slug]) }}" title="View Product"><i class="ti-eye"></i></a></li>
                                            {{--<li><a href="#"><i class="ti-heart"></i></a></li>--}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="item-info text-center text-black p-a10">
                                    <h6 class="item-title text-uppercase font-weight-500"><a href="{{ route('product', ['id'=>$product->id, 'slug'=>$slug]) }}">{{ strtoupper($product->title) }}</a></h6>
                                    <ul class="item-review">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <h4 class="item-price">{{--<del>$232</del>--}} <span class="text-primary">₦{{ number_format($product->price, 2) }}</span></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
       </div>
    </div>
    {{--<div class="section-full bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 p-lr0">
                    <div class="dlab-box"> 
                        <div class="dlab-media dlab-img-overlay2 dlab-img-effect on rotate"> <img src="images/product/fancy/item1.jpg" alt="">
                            <div class="dlab-info-has p-a20 no-hover ">
                                <a href="#" class="site-button button-sm">Fashion</a>
                                <h5>There are many variations.</h5>
                                <div class="dlab-post-meta text-white">
                                    <ul>
                                        <li class="post-date"> <i class="ti-calendar"></i><strong>10 Aug</strong> <span> 2016</span> </li>
                                        <li class="post-author"><i class="ti-user"></i>By <a href="#">demongo</a> </li>
                                        <li class="post-comment"><i class="ti-comment-alt"></i> <a href="#">0</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 p-lr0">
                    <div class="dlab-box"> 
                        <div class="dlab-media dlab-img-overlay2 dlab-img-effect on rotate"> <img src="images/product/fancy/item2.jpg" alt="">
                            <div class="dlab-info-has p-a20 no-hover ">
                                <a href="#" class="site-button button-sm red">Fashion</a>
                                <h5>There are many variations.</h5>
                                <div class="dlab-post-meta text-white">
                                    <ul>
                                        <li class="post-date"> <i class="ti-calendar"></i><strong>10 Aug</strong> <span> 2016</span> </li>
                                        <li class="post-author"><i class="ti-user"></i>By <a href="#">demongo</a> </li>
                                        <li class="post-comment"><i class="ti-comment-alt"></i> <a href="#">0</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 p-lr0">
                    <div class="dlab-box"> 
                        <div class="dlab-media dlab-img-overlay2 dlab-img-effect on rotate"> <img src="images/product/fancy/item3.jpg" alt="">
                            <div class="dlab-info-has p-a20 no-hover ">
                                <a href="#" class="site-button button-sm pink">Fashion</a>
                                <h5>There are many variations.</h5>
                                <div class="dlab-post-meta text-white">
                                    <ul>
                                        <li class="post-date"> <i class="ti-calendar"></i><strong>10 Aug</strong> <span> 2016</span> </li>
                                        <li class="post-author"><i class="ti-user"></i>By <a href="#">demongo</a> </li>
                                        <li class="post-comment"><i class="ti-comment-alt"></i> <a href="#">0</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 p-lr0">
                    <div class="dlab-box"> 
                        <div class="dlab-media dlab-img-overlay2 dlab-img-effect on rotate"> <img src="images/product/fancy/item4.jpg" alt="">
                            <div class="dlab-info-has p-a20 no-hover ">
                                <a href="#" class="site-button button-sm pink">Fashion</a>
                                <h5>There are many variations.</h5>
                                <div class="dlab-post-meta text-white">
                                    <ul>
                                        <li class="post-date"> <i class="ti-calendar"></i><strong>10 Aug</strong> <span> 2016</span> </li>
                                        <li class="post-author"><i class="ti-user"></i>By <a href="#">demongo</a> </li>
                                        <li class="post-comment"><i class="ti-comment-alt"></i> <a href="#">0</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        </div>	
    </div>--}}
    <div class="section-full p-t50 p-b20 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="icon-bx-wraper left m-b30">
                        <div class="icon-md text-black radius"> 
                            <a href="#" class="icon-cell text-black"><i class="fa fa-gift"></i></a> 
                        </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte">Free shipping within Lagos Mainland</h5>
                            <p>Order more than ₦50k and you will get free shipping to your destination on Lagos Mainland. More info.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="icon-bx-wraper left m-b30">
                        <div class="icon-md text-black radius"> 
                            <a href="#" class="icon-cell text-black"><i class="fa fa-plane"></i></a> 
                        </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte">Nationwide delivery</h5>
                            <p>We deliver within Lagos and other states base on request</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="icon-bx-wraper left m-b30">
                        <div class="icon-md text-black radius"> 
                            <a href="#" class="icon-cell text-black"><i class="fa fa-history"></i></a> 
                        </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte">15 days money back guaranty!</h5>
                            <p>Not happy with our product, feel free to return it, we will refund 100% your money! T&C apply</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection