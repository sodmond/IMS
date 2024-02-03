@extends('layouts.admin', ['activePage' => 'invoices', 'title' => 'Invoice'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Invoice</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
        @if($payment)
            <a class="btn btn-primary btn-sm" href="{{ route('admin.payment', ['id' => $payment->id]) }}">
                <i class="fa fa-eye"></i> View Payment
            </a>
        @endif
        &nbsp;
        <a class="btn btn-info btn-sm" href="{{ route('admin.order', ['id' => $invoice->order_id]) }}">
            <i class="fa fa-eye"></i> View Order
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="m-0 font-weight-bold text-dark col-md-6">Invoice Details</h6>
                    <div class="col-md-6 text-md-right">
                        @if(! $payment)
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addPaymentModal">
                                <i class="fa fa-wallet"></i> Add Payment
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
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
                            <div class="alert alert-success"><strong>Success!</strong> {{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $invoice->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Fee</th>
                                        <td>#{{ number_format($invoice->shipping_fee, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tax</th>
                                        <td>#{{ number_format($invoice->tax, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td>{{ number_format($invoice->discount, 2) }}%</td>
                                    </tr>
                                    <tr>
                                        <th>Total Cost</th>
                                        <td>#{{ number_format($invoice->total_cost, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($invoice->status == 1)
                                                <span class="bg-success text-white px-2 py-1">Paid</span>
                                            @else
                                                <span class="bg-danger text-white px-2 py-1">Unpaid</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Lead Time</th>
                                        <td>{{ $invoice->lead_times }}</td>
                                    </tr>
                                    <tr>
                                        <th>Note</th>
                                        <td>{{ $invoice->note }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Created</th>
                                        <td>{{ $invoice->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>...</th>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Generate Invoice Modal-->
<div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Form</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.invoice.pay', ['id' => $invoice->id]) }}" method="post" id="paymentForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-2">
                        <label class="col-md-3 text-right">Amount <sup style="color:#F00;">*</sup></label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="amount" id="amount" required value="{{ $invoice->total_cost ?? 0 }}" readonly>
                        </div>
                    </div>
                    <div class="row my-2">
                        <label class="col-md-3 text-right">Reference <sup style="color:#F00;">*</sup></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="reference" id="reference" required value="{{ $payment->reference ?? '' }}">
                        </div>
                    </div>
                    <div class="row my-2">
                        <label class="col-md-3 text-right">Proof <sup style="color:#F00;">*</sup></label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="proof" id="proof" required>
                        </div>
                    </div>
                    <div class="row my-2">
                        <label class="col-md-3 text-right">Memo</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="memo" id="memo">{{ $payment->memo ?? '' }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-info" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('paymentForm').submit();">Submit</a>
            </div>
        </div>
    </div>
</div>
@endsection
