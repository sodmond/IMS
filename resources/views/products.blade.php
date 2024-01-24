@extends('layouts.app', ['title' => 'All Products', 'activePage' => 'products'])

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-middle bg-pt p-t100" style="background-image:url({{ asset('frontend/images/slider/slide3.jpg') }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry align-m text-center">
                <h1 class="text-white">All Products</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Products</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner">
        <!-- Product -->
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                @php $slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $product->title))); @endphp
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="item-box m-b10">
                        <div class="item-img">
                            <img src="{{ asset('storage/'.$product->image) }}" alt=""/>
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
                            <h6 class="item-title font-weight-500"><a href="{{ route('product', ['id'=>$product->id, 'slug'=>$slug]) }}">{{ ucwords($product->title) }}</a></h6>
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
@endsection