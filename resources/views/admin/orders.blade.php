@extends('layouts.admin', ['activePage' => 'orders', 'title' => 'Orders'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
        
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">List of All Orders</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Date Created</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ \App\Models\User::getUserFullName($order->user_id) }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->comment }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href='{{ route('admin.order', ['id' => $order->id]) }}'>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">{{ $orders->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
