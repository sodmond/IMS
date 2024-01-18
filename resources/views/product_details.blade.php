@extends('layouts.app', ['title' => ucwords($product->title), 'activePage' => 'products'])

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-middle bg-pt p-t100" style="background-image:url({{ asset('frontend/images/slider/slide3.jpg') }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry align-m text-center">
                <h1 class="text-white">{{ ucwords($product->title) }}</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('products') }}">Products</a></li>
                        <li>{{ ucwords($product->title) }}</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner bg-white">
        <!-- Product details -->
        <div class="container woo-entry">
            <div class="row m-b30">
                    <div class="col-md-5 col-lg-5 col-sm-4">
                        <div class="">
                            <img class="img-responsive" src="{{ asset('storage/'.$product->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-8">
                        <form method="post" class="cart sticky-top">
                            <div class="relative">
                                <h3 class="m-tb10">₦{{ number_format($product->price, 2) }} </h3>
                                <div class="shop-item-rating">
                                    <span class="rating-bx"> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                    </span>
                                    <span>4.5 Rating</span>
                                </div>
                            </div>
                            <div class="shop-item-tage">
                                <span>Category: </span>
                                <a href="#">{{ ucwords($category->title) }}</a>
                            </div>
                            <div class="dlab-divider bg-gray tb15"><i class="icon-dot c-square"></i></div>
                            <div class="row">
                                <div class="m-b30 col-md-5 col-sm-4">
                                    <h6>Select quantity</h6>
                                    <div class="quantity btn-quantity style-1">
                                        <input id="demo_vertical2" type="text" value="1" name="demo_vertical2"/>
                                    </div>
                                </div>
                            </div>
                            <button class="site-button radius-no"><i class="ti-shopping-cart"></i> Add To Cart</button>
                        </form>
                    </div>
            </div>
            <div class="row mb-4 pb-4">
                <div class="col-lg-12">
                    <div class="dlab-tabs  product-description tabs-site-button">
                        <ul class="nav nav-tabs ">
                            <li><a data-toggle="tab" href="#web-design-1" class="active"><i class="fa fa-globe"></i> Description</a></li>
                            <li><a data-toggle="tab" href="#developement-1"><i class="fa fa-star"></i> Rating & Review</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="web-design-1" class="tab-pane active">
                                <p class="m-b10">{{ $product->description }}</p>
                            </div>
                            <div id="developement-1" class="tab-pane">
                                <div id="comments">
                                    <ol class="commentlist">
                                        <li class="comment">
                                            <div class="comment_container"> <img class="avatar avatar-60 photo" src="images/testimonials/pic1.jpg" alt="">
                                                <div class="comment-text">
                                                    <div  class="star-rating">
                                                        <div data-rating='3'> <i class="fa fa-star" data-alt="1" title="regular"></i> <i class="fa fa-star" data-alt="2" title="regular"></i> <i class="fa fa-star-o" data-alt="3" title="regular"></i> <i class="fa fa-star-o" data-alt="4" title="regular"></i> <i class="fa fa-star-o" data-alt="5" title="regular"></i> </div>
                                                    </div>
                                                    <p class="meta"> <strong class="author">Cobus Bester</strong> <span><i class="fa fa-clock-o"></i> March 7, 2013</span> </p>
                                                    <div class="description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="comment">
                                            <div class="comment_container"> <img class="avatar avatar-60 photo" src="images/testimonials/pic3.jpg" alt="">
                                                <div class="comment-text">
                                                    <div  class="star-rating">
                                                        <div data-rating='3'> <i class="fa fa-star" data-alt="1" title="regular"></i> <i class="fa fa-star" data-alt="2" title="regular"></i> <i class="fa fa-star" data-alt="3" title="regular"></i> <i class="fa fa-star" data-alt="4" title="regular"></i> <i class="fa fa-star-o" data-alt="5" title="regular"></i> </div>
                                                    </div>
                                                    <p class="meta"> <strong class="author">Cobus Bester</strong> <span><i class="fa fa-clock-o"></i> March 7, 2013</span> </p>
                                                    <div class="description">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond">
                                            <h3 class="comment-reply-title" id="reply-title">Add a review</h3>
                                            <form class="comment-form" method="post" >
                                                <div class="comment-form-author">
                                                    <label>Name <span class="required">*</span></label>
                                                    <input type="text" aria-required="true" size="30" value="" name="author" id="author">
                                                </div>
                                                <div class="comment-form-email">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="text" aria-required="true" size="30" value="" name="email" id="email">
                                                </div>
                                                <div class="comment-form-rating">
                                                    <label class="pull-left m-r20">Your Rating</label>
                                                    <section class='rating-widget'>
                                                    <!-- Rating Stars Box -->
                                                      <div class='rating-stars'>
                                                        <ul id='stars'>
                                                          <li class='star' title='Poor' data-value='1'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                          </li>
                                                          <li class='star' title='Fair' data-value='2'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                          </li>
                                                          <li class='star' title='Good' data-value='3'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                          </li>
                                                          <li class='star' title='Excellent' data-value='4'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                          </li>
                                                          <li class='star' title='WOW!!!' data-value='5'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                    </section>
                                                </div>
                                                <div class="comment-form-comment">
                                                    <label>Your Review</label>
                                                    <textarea aria-required="true" rows="8" cols="45" name="comment" id="comment"></textarea>
                                                </div>
                                                <div class="form-submit">
                                                    <input type="submit" value="Submit" class="site-button" id="submit" name="submit">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="m-b20">Related Products</h5>
                    <div class="img-carousel-content owl-carousel owl-btn-center-lr owl-btn-1 primary">
                        @foreach ($related_products as $product)
                        @php $slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $product->title))); @endphp
                        <div class="item">
                            <div class="item-box">
                                <div class="item-img">
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="">
                                    <div class="item-info-in">
                                        <ul>
                                            <li><a href="{{ route('product', ['id'=>$product->id, 'slug'=>$slug]) }}"><i class="ti-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item-info text-center text-black p-a10">
                                    <h6 class="item-title text-uppercase font-weight-500"><a href="{{ route('product', ['id'=>$product->id, 'slug'=>$slug]) }}">{{ ucwords($product->title) }}</a></h6>
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
        <!-- Product details -->
    </div>
    <!-- contact area  END -->   
</div>
@endsection