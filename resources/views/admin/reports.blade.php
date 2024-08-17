@extends('layouts.admin', ['activePage' => 'home', 'title' => 'Reports'])

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h1 class="h3 mb-0 text-gray-800">Reports</h1>
    </div>
    <div class="col-md-6 text-right">
        &nbsp;
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-success py-3">
                <h6 class="m-0 font-weight-bold text-white">Filter Report</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ route('admin.reports.filter') }}" method="get">
                            @csrf
                            <fieldset class="row">
                                <div class="col-md-4 mb-4">
                                    <label for="type">Type <sup style="color:#F00;">*</sup></label>
                                    <select type="text" class="form-control" name="type" id="type" required>
                                        <option value="">- - - Select Report Type - - -</option>
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="filter">Date Filter</label>
                                    <input type="date" class="form-control" name="filter" id="filter" required>
                                </div>
                                <div class="col-md-3">
                                    <label for=""></label><br>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </fieldset>
                            <div class="small text-info"><strong>Note:</strong> For weekly and monthly reports, simply select a date from the week/month you require.</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        @php 
            $filter = $_GET['filter'] ?? date('Y-m-d');
            if ($type == 'weekly') {
                $date = new \DateTime($filter);
                $filter = 'Week ' . $date->format("W") . ', ' . $date->format("Y");
            }
            if ($type == 'monthly') {
                $date = new \DateTime($filter);
                $filter = $date->format("F") . ', ' . $date->format("Y");
            }
        @endphp
        <h1 class="h5 mb-0 text-gray-800">{{ ucwords($type) }} Reports for <em>{{ $filter }}</em></h1>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            New Customers
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

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            <a class="text-info" href="{{ route('admin.products', ['filter' => 'all']) }}">Added Products</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($products->count()) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
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
                        <i class="fas fa-location-arrow fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ordersCompleted->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            <a class="text-danger" href="javascript:void(0)">Total Completed Orders</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">₦{{ number_format($invoiceTotal, 2) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
@endsection
