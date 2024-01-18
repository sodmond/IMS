@extends('layouts.admin', ['activePage' => 'products', 'title' => 'Products'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
        <a class="btn btn-info btn-sm" href='{{ route("admin.product.new") }}'>
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">
                    @if($filter == 'all') 
                        List of All Products
                    @else
                        Search result for <em>"{{$filter}}"</em>
                    @endif
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.products.search') }}" method="get" class="row mb-3">
                            <div class="col-sm-12 col-md-8 mb-2">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Search for products by title" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <button class="btn btn-info" type="submit"><i class="fas fa-search fa-sm"></i> Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>...</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Part #</th>
                                        <th>Date Created</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? ($_GET['page']*10)-9 : 1; ?>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $row++ }}</td>
                                            <td><img class="img-fluid img-thumbnail" src='{{ asset("storage/$product->image") }}' style="max-width:50px;"></td>
                                            <td>{{ ucwords(\App\Models\Product::getProductCatName($product->category_id)) }}</td>
                                            <td>{{ ucwords($product->title) }}</td>
                                            <td>{{ $product->part_number }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href='{{ route('admin.product', ['id' => $product->id]) }}'>
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
