@extends('layouts.admin', ['activePage' => 'payments', 'title' => 'Payment Details'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Payment Details</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
        <a class="btn btn-info btn-sm" href="{{ route('admin.invoice', ['id' => $payment->invoice_id]) }}">
            <i class="fa fa-eye"></i> View Invoice
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Single Payment Details</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $payment->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Amount</th>
                                        <td>#{{ number_format($payment->amount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Reference</th>
                                        <td>{{ $payment->reference }}</td>
                                    </tr>
                                    <tr>
                                        <th>Memo</th>
                                        <td>{{ $payment->memo }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Created</th>
                                        <td>{{ $payment->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Proof</th>
                                        <td><a class="btn btn-info btn-sm" href="{{ asset('storage/'.$payment->proof) }}" >Download</a></td>
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
@endsection
