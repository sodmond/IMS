@extends('layouts.admin', ['activePage' => 'invoices', 'title' => 'Invoices'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Invoices</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
        
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">List of All Invoices</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Order ID</th>
                                        <th>Total Cost</th>
                                        <th>Shipping Fee</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>{{ $invoice->id }}</td>
                                            <td>{{ $invoice->order_id }}</td>
                                            <td>{{ number_format($invoice->total_cost) }}</td>
                                            <td>{{ number_format($invoice->shipping_fee) }}</td>
                                            <td>
                                                @if ($invoice->status == 1)
                                                    <span class="bg-success text-white px-2 py-1">Paid</span>
                                                @else
                                                    <span class="bg-danger text-white px-2 py-1">Unpaid</span>
                                                @endif
                                            </td>
                                            <td>{{ $invoice->created_at }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href='{{ route('admin.invoice', ['id' => $invoice->id]) }}'>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">{{ $invoices->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
