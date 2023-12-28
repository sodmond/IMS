@extends('layouts.admin')

@section('title') 
    Referral List
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Referral List</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4">
        @if(Auth::user()->role == 'superuser')
        <form class="form-row" action="{{ url('/reflist_export') }}" method="get">
            <div class="col-md-6">
                <input type="date" class="form-control form-control-sm" id="wkdate" name="wkdate" required>
            </div>
            <div class="col-md-6">
                <button class="btn btn-info btn-sm">
                    <i class="fas fa-download fa-sm"></i> Generate Report
                </button>
            </div>
        </form>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">List of All Referrals</h6>
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
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allRef as $ref)
                                    <tr>
                                        <td>{{ $ref->ref_code }}</td>
                                        <td>{{ $ref->fullname }}</td>
                                        <td>{{ $ref->email }}</td>
                                        <td>{{ str_pad($ref->phone, 11, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $ref->created_at }}</td>
                                        <td>
                                            <a href='{{url("/user_profile/$ref->id")}}'>
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye fa-sm"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">{{ $allRef->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
