@extends('layouts.admin')

@section('title') 
    Search Page
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Search Page</h1>
    </div>
    <div class="col-md-2">&nbsp;</div>
    <div class="col-md-6">
        <form class="form-row" action="{{ url('/search') }}" method="get">
            <div class="col-md-10">
                <input type="text" class="form-control form-control-sm" id="searchVal" name="searchVal" 
                    placeholder="Search referral list by email, referral code or name" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-info btn-sm">
                    <i class="fas fa-search fa-sm"></i> Search
                </button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">
                    Search result for @isset($sVal) <em>"{{$sVal}}"</em> @endisset
                </h6>
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
                                @isset($sRef)
                                <tbody>
                                    @foreach($sRef as $ref)
                                    <tr>
                                        <td>{{ $ref->ref_code }}</td>
                                        <td>{{ $ref->fullname }}</td>
                                        <td>{{ $ref->email }}</td>
                                        <td>{{ str_pad($ref->phone, 11, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $ref->created_at }}</td>
                                        <td>
                                            <a href='{{url("/user_profile/$ref->id")}}'>
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye fa-sm"></i> View
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endisset
                            </table>
                        </div>
                        <div class="row justify-content-center">
                            @isset($sRef) 
                                {{ $sRef->links() }} 
                            @endisset
                            @isset($empty_msg)
                                <h5 style="font-style:italic;">{{$empty_msg}}</h5>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
