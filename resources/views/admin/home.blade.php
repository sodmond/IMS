@extends('layouts.admin', ['activePage' => 'home', 'title' => 'Dashboard'])

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="col-md-6 text-right">
        <a class="btn btn-info btn-sm" href='{{ route("admin.reports", ['type' => 'daily']) }}'>
            <i class="fa fa-chart-pie"></i> Detailed Reports
        </a>
    </div>
</div>

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="{{ route('admin.users', ['filter' => 'all']) }}">Total Customers</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($users->count()) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            <a class="text-info" href="{{ route('admin.products', ['filter' => 'all']) }}">Total Products</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($products->count()) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            <a class="text-danger" href="{{ route('admin.products', ['filter' => 'low_stock']) }}">Out of Stock Products</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($productsOutOfStock->count()) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-ban fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            <a class="text-dark" href="{{ route('admin.orders') }}">All Orders</a>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $orders->count() }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ordersCompleted->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            <a class="text-warning" href="javascript:void(0)">Total Completed Orders</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">₦{{ number_format($invoiceTotal, 2) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!--
<div class="row">
    <div class="col-lg-7 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Top Customers by Order Amount</h6>
            </div>
            <div class="card-body">
                {{--@foreach($totalUserByRef as $cust)
                <h4 class="small font-weight-bold">{{$cust['fullname']}} <span class="float-right">{{$cust['freq']}}%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" @php echo 'style="width: '.$cust['freq'].'%"' @endphp aria-valuenow="{{$cust['freq']}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endforeach--}}
            </div>
        </div>
    </div>

    <div class="col-lg-5 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Orders</h6>
            </div>
            <div class="card-body">
                <div>
                    <input type="hidden" id="male" value="{{-- $gender['male'] --}}">
                    <input type="hidden" id="female" value="{{-- $gender['female'] --}}">
                </div>
                <div class="chart-pie pt-4 pb-2">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="genderChart" style="display: block; width: 301px; height: 245px;" class="chartjs-render-monitor" width="301" height="245"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Cancelled
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Pending
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Completed
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<div class="row">
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
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Date Created</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentOrders as $order)
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
