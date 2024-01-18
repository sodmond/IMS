@extends('layouts.admin', ['activePage' => 'products', 'title' => 'Product Details'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Product Details</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10 mb-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <img class="img-fluid" src='{{ asset("storage/$product->image") }}' alt="{{ $product->title }}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $product->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ ucwords(\App\Models\Product::getProductCatName($product->category_id)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Part Number</th>
                                        <td>{{ $product->part_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>₦{{ number_format($product->price) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Available Quantity</th>
                                        <td>{{ $product->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Created</th>
                                        <td>{{ $product->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Updated</th>
                                        <td>{{ $product->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if(Auth::user()->role != 'user')
                        <div class="row">
                            <div class="col-md">
                                <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="btn btn-info"><i class="fas fa-edit fa-sm"></i> Edit</a>
                            </div>
                            <div class="col-md text-right">
                                <a href="{{----}}" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i> Delete</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
