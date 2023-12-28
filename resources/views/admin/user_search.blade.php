@extends('layouts.admin')

@section('title') 
    Search
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Search</h1>
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
