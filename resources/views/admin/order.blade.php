@extends('layouts.admin', ['activePage' => 'orders', 'title' => 'Single Order'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Single Order</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addProductModal">
            <i class="fa fa-plus"></i> Add Product
        </button>
        <button type="button" class="btn btn-danger" id="deleteOrderBtn">
            <i class="fa fa-trash"></i> Delete Order
        </button>
        <input type="hidden" id="deleteOrderUrl" value="{{ route('admin.order.delete', ['id' => $order->id]) }}">
    </div>
</div>

<div class="row">
    <div class="col-12 mb-2">
        @if (count($errors))
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Error validating data.<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-sm alert-success" role="alert"><strong>Success!</strong> {{ session('success') }}</div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="m-0 font-weight-bold text-dark col-md-6">Order Details</h6>
                    <div class="col-md-6 text-md-right">
                        <a class="btn btn-info btn-sm" href='{{ route("admin.order.invoicegen", ['id' => $order->id]) }}'>
                            <i class="fa fa-sync"></i> Generate Invoice
                        </a>
                    </div>
                </div>
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
                                        $total = 0;
                                    ?>
                                    @foreach ($products as $product)
                                        @php 
                                        $requested_qty = $quantityArr[array_search($product->id, $productArr)];
                                        $total += ($order->price * $requested_qty)
                                        @endphp
                                        <tr>
                                            <td>{{ $row++ }}</td>
                                            <td><img class="img-fluid" src='{{ asset("storage/$product->image") }}' style="max-width:50px;"></td>
                                            <td id="{{ 'productName'.$product->id }}">{{ $product->title }}</td>
                                            <td>{{ $product->part_number }}</td>
                                            <td>₦{{ number_format($product->price) }}</td>
                                            <td>{{ $requested_qty }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" title="View product" href="{{ route('admin.product', ['id' => $product->id]) }}" target="_blank">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                &nbsp;
                                                <button class="btn btn-primary btn-sm" title="Edit quantity" onclick="editQty({{ $product->id }}, {{$requested_qty}})">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm" title="Remove product" onclick="removeProductBox({{ $product->id }})">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
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

<!-- Add Product Quantity Modal-->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product to Order</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $order->id.'/add-product' }}" method="post" id="addProductForm">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <label class="">Product</label>
                            <select class="selectpicker form-control" name="product_id" title="Select a Product" data-live-search="true" data-style="btn-input" required>
                                @foreach ($allProducts as $product)
                                    <option value="{{$product->id}}">{{ucwords($product->title)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-4">
                            <label class="">Quantity</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-info" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('addProductForm').submit();">Submit</a>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Quantity Modal-->
<div class="modal fade" id="editQtyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product Quantity?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $order->id.'/edit-product' }}" method="post" id="editProductQtyForm">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="h5 text-center mt-2" id="productName"></div>
                    <div class="row">
                        <label class="col-3 text-right">Requested QTY</label>
                        <div class="col-9">
                            <input type="number" class="form-control" name="quantity" id="product_qty">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-info" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('editProductQtyForm').submit();">Submit</a>
            </div>
        </div>
    </div>
</div>

<!-- Remove Product Modal-->
<div class="modal fade" id="removeProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Do you want to remove the selected product from this order? Click remove to proceed.
                <form action="{{ $order->id.'/remove-product' }}" method="post" id="productRemoveForm">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="h5 text-center mt-2" id="productName"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('productRemoveForm').submit();">Remove</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
    <script>
        function removeProductBox(id) {
            var productName = $('#productName'+id).text();
            $('#productName').text(productName);
            $('#product_id').val(id);
            $('#removeProductModal').modal('show');
        }
        function editQty(id, qty) {
            var productName = $('#productName'+id).text();
            $('#productName').text(productName);
            $('#product_id').val(id);
            $('#product_qty').val(qty);
            $('#editQtyModal').modal('show');
        }
        $('#deleteOrderBtn').click(function() {
            var x = confirm('Do you want to delete this order? This process cannot be reversed');
            if (x == true) {
                var url = $('#deleteOrderUrl').val();
                window.location.href = url;
                //alert(url);
            }
        });
    </script>
@endpush
