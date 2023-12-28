@extends('layouts.admin')

@section('title') 
    Dashboard
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Referrals</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalRef) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Registered (Today)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($todayRef) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Registered (Yesterday)</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format($yesterdayRef) }}</div>
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

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Units Sold Directly</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($unitSold->unitsum) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Direct Commissions
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($todayRef) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comment-dollar fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Indirect Commissions
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format($yesterdayRef) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments-dollar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<div class="row">
    <div class="col-md-5 mb-4">
        <strong>Upline Name:</strong> {{ ($upline == '') ? 'Dealclinchers' : $upline->fullname }}
    </div>
    <div class="col-md-7 mb-4">
        <strong>Upline Phone Number:</strong> {{ ($upline == '') ? 'Dealclinchers' : '0'.$upline->phone }}
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-body" style="background-color: #18B1AC;">
                <img class="img-fluid" src="{{ asset('img/commission-structure.jpeg') }}" alt="Commission Structure">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-body" style="background-color: #CEA94E;">
                <img class="img-fluid" src="{{ asset('img/incentives.jpeg') }}" alt="Incentives">
                <div style="position:absolute; margin-top:-160px; margin-left:35%;">
                    <a class="btn" href="{{ url('incentives-nov-21-01.pdf') }}" target="_blank" style="background-color:#000; color:#FFF;">
                        Check it Out <i class="fa fa-location-arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Recent Registered Referrals</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Referral ID</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentRef as $ref)
                                    <tr>
                                        <td>{{ $ref->ref_code }}</td>
                                        <td>{{ $ref->fullname }}</td>
                                        <td>{{ $ref->email }}</td>
                                        <td>{{ str_pad($ref->phone, 11, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $ref->created_at }}</td>
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
