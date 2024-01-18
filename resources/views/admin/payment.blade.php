@extends('layouts.admin', ['activePage' => 'products', 'title' => 'Products'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
        <a class="btn btn-info btn-sm" href='{{ url("/properties/new") }}'>
            <i class="fa fa-plus"></i> Add New
        </a>
        &nbsp;
        <a class="btn btn-secondary btn-sm" href='{{ url("/properties/trash") }}'>
            <i class="fa fa-trash"></i> Trash List
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">List of All Products</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Part #</th>
                                        <th>Price</th>
                                        <th>Available QTY</th>
                                        <th>Date Created</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->category_id }}</td>
                                            <td><img class="img-fluid" src='{{ asset("storage/$product->image") }}'></td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->part_number }}</td>
                                            <td>₦{{ number_format($product->price) }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href='{{ route('product', ['id' => $property->id]) }}'>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">{{ $products->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
