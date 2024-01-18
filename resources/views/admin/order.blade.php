@extends('layouts.admin', ['activePage' => 'orders', 'title' => 'Single Order'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Single Order</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
        <a class="btn btn-info btn-sm" href='{{ url("/properties/new") }}'>
            <i class="fa fa-sync"></i> Generate Invoice
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Order Details</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="table-responsive">
                            <table class="table table-striped table-info">
                                <tr>
                                    <th>Order ID</th>
                                    <td>{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $order->status }}</td>
                                </tr>
                                <tr>
                                    <th>Note</th>
                                    <td>{{ $order->comment }}</td>
                                </tr>
                                <tr>
                                    <th>Date Created</th>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ $order->updated_at }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Part #</th>
                                        <th>Price</th>
                                        <th>Requested QTY</th>
                                        <th>Available QTY</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $row = (isset($_GET['page']) && $_GET['page'] != 1) ? ($_GET['page']*10)-9 : 1;
                                        $productArr = json_decode($order->products, true);
                                        $quantityArr = json_decode($order->quantity, true);
                                    ?>
                                    @foreach ($products as $product)
                                        @php $requested_qty = $quantityArr[array_search($product->id, $productArr)] @endphp
                                        <tr>
                                            <td>{{ $row++ }}</td>
                                            <td><img class="img-fluid" src='{{ asset("storage/$product->image") }}' style="max-width:50px;"></td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->part_number }}</td>
                                            <td>₦{{ number_format($product->price) }}</td>
                                            <td>{{ $requested_qty }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" title="View product" href="{{ route('admin.product', ['id' => $product->id]) }}" target="_blank">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                &nbsp;
                                                <a class="btn btn-danger btn-sm" title="Remove product" href="#">
                                                    <i class="fa fa-minus-circle"></i>
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
