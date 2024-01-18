@extends('layouts.admin', ['activePage' => 'payments', 'title' => 'Payments'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Payments</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
        
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">List of All Payments</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Invoice ID</th>
                                        <th>Amount</th>
                                        <th>Reference</th>
                                        <th>Date Created</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment->invoice_id }}</td>
                                            <td>{{ number_format($payment->amount) }}</td>
                                            <td>{{ $payment->reference }}</td>
                                            <td>{{ $payment->created_at }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href='{{ route('admin.payment', ['id' => $payment->id]) }}'>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">{{ $payments->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
