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
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                @endif
                @if ($cart->count() < 1)
                <div class="col-lg-12 text-center">
                    <h2>Your cart is currently empty.</h2>
                    <a href="{{ route('products') }}" class="site-button">Return To Shop</a>
                </div>
                @else
                <div class="col-lg-8 m-b30">
                    <form class="shop-cart-2 bg-white table-responsive" id="cartForm" method="POST" action="">
                        @csrf
                        <div class="shop-cart-2-head clearfix pb-3">
                            <h6 class="font-weight-700 pull-left m-a0">MY CART ({{$cart->count()}})</h6>
                            <div class="dropdown">
                                {{--<ul class="m-a0 list-inline">
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
                                </ul>--}}
                            </div>
                        </div>
                        <table class="table shop-cart-2-list check-tbl">
                            <tbody>
                                @php $total = 0; @endphp
                                @if($cart->count() > 0)
                                    @foreach($cart as $item)
                                    @php 
                                    $total += ($products[$item->product_id]->price * $item->quantity);
                                    $slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $products[$item->product_id]->title))); 
                                    @endphp
                                    <input type="hidden" name="product_ids[]" value="{{ $item->product_id }}">
                                    <tr>
                                        <td class="product-item-img">
                                            <img src="{{ asset('storage/'.$products[$item->product_id]->image) }}" alt=""> 
                                            <div class="product-item-quantity m-t15">
                                                <div class="quantity btn-quantity max-w80">
                                                    QTY: <input type="text" class="demo_vertical2" value="{{ $item->quantity }}" name="quantities[]"/>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-item-details">
                                            <h6 class="product-item-title">
                                                <a href="{{ route('product', ['id'=>$item->product_id, 'slug'=>$slug]) }}">{{ ucwords($products[$item->product_id]->title) }}</a>
                                            </h6>
                                            <div class="font-weight-400"><small><b>Category:</b> {{ \App\Models\Product::getProductCatName($products[$item->product_id]->category_id) }}</small></div>
                                            <div class="product-item-price font-20 m-tb10 text-secondry">₦{{ number_format($products[$item->product_id]->price, 2) }}</div>
                                            <div class="product-item-close"><a href="#" onclick="event.preventDefault(); window.location.href='{{route('cart.remove', ['id' => $item->product_id])}}'">REMOVE</a></div>
                                        </td>
                                        <td class="product-item-time">
                                            <p class="m-b0 text-black">Prices are subject to change</p>
                                            <p class="m-b0"><small>Exact price will be included when you receive the invoice</small></p>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="m-b0 text-center py-4">Cart is Empty</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </form>
                </div>
                <!-- Shop Cart 2 Details -->
                <div class="col-lg-4 m-b30">
                    <div class="shop-cart-2-details sticky-top bg-white">
                        {{--<div class="details-head">PRICE DETAILS</div>
                        <div class="details-list text-secondry p-tb15 p-lr30">
                            <ul class="m-a0">
                                <li>Price ({{$cart->count()}} items)<span class="pull-right">₦{{ number_format($total, 0) }}</span></li>
                                <li>Delivery Charges<span class="pull-right text-primary">TBD</span></li>
                                <li class="font-weight-600">Amount Payable<span class="pull-right">₦{{ number_format($total, 0) }}</span></li>
                            </ul>
                        </div>--}}
                        <div class="details-info text-primary">
                            <button class="site-button button-lg btn-block" type="button" onclick="event.preventDefault(); document.forms.cartForm.submit();">
                                Continue to Checkout </button>
                        </div>
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