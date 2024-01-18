@extends('layouts.app', ['title' => 'Cart', 'activePage' => 'products'])

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-middle bg-pt p-t100" style="background-image:url({{ asset('frontend/images/slider/slide3.jpg') }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry align-m text-center">
                <h1 class="text-white">Cart</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner-2">
        <!-- Product -->
        <div class="container">
            <div class="row">
                @if (1!=1)
                <div class="col-lg-12 text-center">
                    <h2>Your cart is currently empty.</h2>
                    <a href="" class="site-button">Return To Shop</a>
                </div>
                @else
                <div class="col-lg-8 m-b30">
                    <div class="shop-cart-2 bg-white table-responsive">
                        <div class="shop-cart-2-head clearfix">
                            <h6 class="font-weight-700 pull-left m-a0">MY CART (5)</h6>
                            <div class="dropdown">
                                <ul class="m-a0 list-inline">
                                    <li><i class="fa text-primary m-r10 fa-map-marker"></i></li>
                                    <li><input type="text" class="form-control" value="303030" placeholder="Enter Delivery Pincode"></li>
                                    <li>
                                        <button class="site-button-link text-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">From Saved Addresses</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Recent History</a>
                                            <a class="dropdown-item" href="#">303030</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <table class="table shop-cart-2-list check-tbl">
                            <tbody>
                                <tr>
                                    <td class="product-item-img">
                                        <img src="images/product/thumb/item6.jpg" alt=""> 
                                        <div class="product-item-quantity m-t15">
                                            <div class="quantity btn-quantity max-w80">
                                                <input id="demo_vertical2" type="text" value="1" name="demo_vertical2"/>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-item-details">
                                        <h6 class="product-item-title">
                                            <a href="#">Light Blue Denim Dress</a>
                                        </h6>
                                        <div class="font-weight-400"><small>Brown Strap Regular</small></div>
                                        <div class="font-weight-400"><small>Seller: TimeWorld</small></div>
                                        <div class="product-item-price font-20 m-tb10 text-secondry">$24,495<span class="text-primary font-14 m-l20">2 Offers Available</span></div>
                                        <div class="product-item-save"><a href="#" class="text-black">SAVE FOR LATER</a></div>
                                        <div class="product-item-close"><a href="#">REMOVE</a></div>
                                    </td>
                                    <td class="product-item-time">
                                        <p class="m-b0 text-black">Free delivery in 7-9 days</p>
                                        <p class="m-b0"><small>10 Days Replacement Policy</small></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-item-img">
                                        <img src="images/product/thumb/item1.jpg" alt="">
                                        <div class="product-item-quantity m-t15">
                                            <div class="quantity btn-quantity max-w80">
                                                <input id="demo_vertical2" type="text" value="1" name="demo_vertical2"/>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-item-details">
                                        <h6 class="product-item-title">
                                            <a href="#">Light Blue Denim Dress</a>
                                        </h6>
                                        <div class="font-weight-400"><small>Brown Strap Regular</small></div>
                                        <div class="font-weight-400"><small>Seller: TimeWorld</small></div>
                                        <div class="product-item-price font-20 m-tb10 text-secondry">$24,495<span class="text-primary font-14 m-l20">2 Offers Available</span></div>
                                        <div class="product-item-save"><a href="#" class="text-black">SAVE FOR LATER</a></div>
                                        <div class="product-item-close"><a href="#">REMOVE</a></div>
                                    </td>
                                    <td class="product-item-time">
                                        <p class="m-b0 text-black">Free delivery in 7-9 days</p>
                                        <p class="m-b0"><small>10 Days Replacement Policy</small></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-item-img">
                                        <img src="images/product/thumb/item2.jpg" alt="">
                                        <div class="product-item-quantity m-t15">
                                            <div class="quantity btn-quantity max-w80">
                                                <input id="demo_vertical2" type="text" value="1" name="demo_vertical2"/>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-item-details">
                                        <h6 class="product-item-title">
                                            <a href="#">Light Blue Denim Dress</a>
                                        </h6>
                                        <div class="font-weight-400"><small>Brown Strap Regular</small></div>
                                        <div class="font-weight-400"><small>Seller: TimeWorld</small></div>
                                        <div class="product-item-price font-20 m-tb10 text-secondry">$24,495<span class="text-primary font-14 m-l20">2 Offers Available</span></div>
                                        <div class="product-item-save"><a href="#" class="text-black">SAVE FOR LATER</a></div>
                                        <div class="product-item-close"><a href="#">REMOVE</a></div>
                                    </td>
                                    <td class="product-item-time">
                                        <p class="m-b0 text-black">Free delivery in 7-9 days</p>
                                        <p class="m-b0"><small>10 Days Replacement Policy</small></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-item-img">
                                        <img src="images/product/thumb/item3.jpg" alt="">
                                        <div class="product-item-quantity m-t15">
                                            <div class="quantity btn-quantity max-w80">
                                                <input id="demo_vertical2" type="text" value="1" name="demo_vertical2"/>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-item-details">
                                        <h6 class="product-item-title">
                                            <a href="#">Light Blue Denim Dress</a>
                                        </h6>
                                        <div class="font-weight-400"><small>Brown Strap Regular</small></div>
                                        <div class="font-weight-400"><small>Seller: TimeWorld</small></div>
                                        <div class="product-item-price font-20 m-tb10 text-secondry">$24,495<span class="text-primary font-14 m-l20">2 Offers Available</span></div>
                                        <div class="product-item-save"><a href="#" class="text-black">SAVE FOR LATER</a></div>
                                        <div class="product-item-close"><a href="#">REMOVE</a></div>
                                    </td>
                                    <td class="product-item-time">
                                        <p class="m-b0 text-black">Free delivery in 7-9 days</p>
                                        <p class="m-b0"><small>10 Days Replacement Policy</small></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-item-img">
                                        <img src="images/product/thumb/item4.jpg" alt="">
                                        <div class="product-item-quantity m-t15">
                                            <div class="quantity btn-quantity max-w80">
                                                <input id="demo_vertical2" type="text" value="1" name="demo_vertical2"/>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-item-details">
                                        <h6 class="product-item-title">
                                            <a href="#">Light Blue Denim Dress</a>
                                        </h6>
                                        <div class="font-weight-400"><small>Brown Strap Regular</small></div>
                                        <div class="font-weight-400"><small>Seller: TimeWorld</small></div>
                                        <div class="product-item-price font-20 m-tb10 text-secondry">$24,495<span class="text-primary font-14 m-l20">2 Offers Available</span></div>
                                        <div class="product-item-save"><a href="#" class="text-black">SAVE FOR LATER</a></div>
                                        <div class="product-item-close"><a href="#">REMOVE</a></div>
                                    </td>
                                    <td class="product-item-time">
                                        <p class="m-b0 text-black">Free delivery in 7-9 days</p>
                                        <p class="m-b0"><small>10 Days Replacement Policy</small></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Shop Cart 2 Details -->
                <div class="col-lg-4 m-b30">
                    <div class="shop-cart-2-details sticky-top bg-white">
                        <div class="details-head">PRICE DETAILS</div>
                        <div class="details-list text-secondry p-tb15 p-lr30">
                            <ul class="m-a0">
                                <li>Price (5 items)<span class="pull-right">$42,830</span></li>
                                <li>Delivery Charges<span class="pull-right text-primary">FREE</span></li>
                                <li class="font-weight-600">Amount Payable<span class="pull-right">$42,830</span></li>
                            </ul>
                        </div>
                        <div class="details-info text-primary">Your Total Savings on this order $274</div>
                    </div>
                </div>
                <!-- Shop Cart 2 Details END -->
                @endif
            </div>
       </div>
        <!-- Product END -->
    </div>
    <div class="section-full p-t50 p-b20 bg-primary text-white overlay-primary-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="icon-bx-wraper left m-b30">
                        <div class="icon-md text-black radius"> 
                            <a href="#" class="icon-cell text-white"><i class="fa fa-gift"></i></a> 
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
                            <a href="#" class="icon-cell text-white"><i class="fa fa-plane"></i></a> 
                        </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte">Nationwide delivery</h5>
                            <p>We deliver within Lagos and other states base on request.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="icon-bx-wraper left m-b30">
                        <div class="icon-md text-black radius"> 
                            <a href="#" class="icon-cell text-white"><i class="fa fa-history"></i></a> 
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
    <!-- contact area  END -->
</div>
@endsection