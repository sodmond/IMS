@extends('layouts.app', ['title' => 'Checkout', 'activePage' => 'products'])

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-middle bg-pt p-t100" style="background-image:url({{ asset('frontend/images/slider/slide3.jpg') }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry align-m text-center">
                <h1 class="text-white">Checkout</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Checkout</li>
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
        @if(session('success'))
        <div class="container">
            <div class="alert alert-success" role="alert"><strong>Success!</strong> {{ session('success') }}</div>
        </div>
        @else
        <form class="container" method="POST" action="">
            @csrf
            <div class="shop-form">
                @if (count($errors))
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There are some problems with your input.<br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-md-6 m-b30">
                        <h4>Billing & Shipping Address</h4>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="billing_firstname" placeholder="First Name" value="{{ old('billing_firstname') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="billing_lastname" placeholder="Last Name" value="{{ old('billing_lastname') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="billing_companyname" placeholder="Company Name (Optional)" value="{{ old('billing_companyname') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="billing_address" placeholder="Address" value="{{ old('billing_address') }}" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="billing_phone" placeholder="Phone" value="{{ old('billing_phone') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-md-6 m-b30">
                        <h4 class="font-weight-600"><button class="site-button-link " type="button" data-toggle="collapse" data-target="#different-address">Ship to a different address <i class="fa fa-arrow-circle-o-down"></i></button></h4>
                        <div id="different-address" class="collapse">
                            <p>If you have a different shipping address from the billing address, please enter your details in the boxes below.</p>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="shipping_firstname" placeholder="First Name" value="{{ old('shipping_firstname') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="shipping_lastname" placeholder="Last Name" value="{{ old('shipping_lastname') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="shipping_companyname" placeholder="Company Name" value="{{ old('shipping_companyname') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="shipping_address" placeholder="Address" value="{{ old('shipping_address') }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="shipping_phone" placeholder="Phone" value="{{ old('shipping_phone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Notes about your order, e.g. special notes for delivery" name="comment">{{ old('comment') }}</textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dlab-divider bg-gray-dark text-gray-dark icon-center"><i class="fa fa-circle bg-white text-gray-dark"></i></div>
            <div class="row">
                <div class="col-lg-6">
                    <h4>Your Order</h4>
                    <table class="table-bordered check-tbl">
                        <thead class="text-center">
                            <tr>
                                <th>IMAGE</th>
                                <th>PRODUCT NAME</th>
                                <th>PRICE</th>
                                <th>QTY</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach($cart as $item)
                                @php $total += ($products[$item->product_id]->price * $item->quantity); @endphp
                                <tr>
                                    <td><img src="{{ asset('storage/'.$products[$item->product_id]->image) }}" alt=""></td>
                                    <td>{{ ucwords($products[$item->product_id]->title) }}</td>
                                    <td class="product-price">₦{{ number_format($products[$item->product_id]->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <div class="shop-form">
                        <h4>Order Total</h4>
                        <table class="table-bordered check-tbl">
                            <tbody>
                                <tr>
                                    <td>Order Subtotal</td>
                                    <td class="product-price">₦{{ number_format($total) }}</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>TBD</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="product-price-total">₦{{ number_format($total) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5>Customer Details</h5>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{ old('firstname') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="companyname" placeholder="Company Name (Optional)" value="{{ old('companyname') }}">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="site-button button-lg btn-block" type="submit">Submit Quote</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
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
                            <h5 class="dlab-tilte">Free shipping on orders $60+</h5>
                            <p>Order more than 60$ and you will get free shippining Worldwide. More info.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="icon-bx-wraper left m-b30">
                        <div class="icon-md text-black radius"> 
                            <a href="#" class="icon-cell text-white"><i class="fa fa-plane"></i></a> 
                        </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte">Worldwide delivery</h5>
                            <p>We deliver to the following countries: USA, Canada, Europe, Australia</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="icon-bx-wraper left m-b30">
                        <div class="icon-md text-black radius"> 
                            <a href="#" class="icon-cell text-white"><i class="fa fa-history"></i></a> 
                        </div>
                        <div class="icon-content">
                            <h5 class="dlab-tilte">60 days money back guranty!</h5>
                            <p>Not happy with our product, feel free to return it, we will refund 100% your money!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
@endsection