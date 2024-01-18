@extends('layouts.admin', ['activePage' => 'users', 'title' => 'Customer Details'])

@section('content')
<div class="row mb-4">
    <div class="col-6">
        <h1 class="h3 mb-0 text-gray-800">Customer Details</h1>
    </div>
    <div class="col-6 text-right">
        <a class="btn btn-dark" href="{{ route('admin.users', ['filter' => 'all']) }}">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Customer Profile Details</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Firstname</th>
                                        <td>{{ $user->firstname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lastname</th>
                                        <td>{{ $user->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ str_pad($user->phone, 11, 0, STR_PAD_LEFT) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Created</th>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Updated</th>
                                        <td>{{ $user->updated_at }}</td>
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

<div class="row justify-content-center">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Recent Orders</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Date Created</th>
                                        <th>Last Updated</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->comment }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->updated_at }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
