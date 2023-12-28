@extends('layouts.admin')

<?php
$name = explode(" ", $profile->fullname);
?>

@section('title') 
    {{$name[0]}}'s Profile
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$name[0]}}'s Profile</h1>
    <a href='{{url("/edit_profile/$profile->id")}}'>
        <button class="btn btn-info btn-sm">
            <i class="fas fa-edit fa-sm"></i> Edit Profile
        </button>
    </a>
</div>

<div class="row">
    <div class="col-lg-7 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Profile Details</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>Referral Code:</strong></td>
                                <td>
                                    <a href='{{url("/sign-up/$profile->id-$profile->ref_code")}}' target="_blank">
                                        <span style="text-decoration:underline;">{{$profile->ref_code}}</span> &nbsp; 
                                        <i class="fas fa-external-link-alt fa-sm"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Fullname:</strong></td>
                                <td>{{$profile->fullname}}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>
                                    <a style="text-decoration:underline;" href="mailto:{{$profile->email}}">{{$profile->email}}</a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Gender:</strong></td>
                                <td>{{$profile->gender}}</td>
                            </tr>
                            <tr>
                                <td><strong>Date of Birth:</strong></td>
                                <td>{{$profile->dob}}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone:</strong></td>
                                <td>{{str_pad($profile->phone, 11, '0', STR_PAD_LEFT)}}</td>
                            </tr>
                            <tr>
                                <td><strong>Address:</strong></td>
                                <td>{{$profile->address}}</td>
                            </tr>
                            <tr>
                                <td><strong>City:</strong></td>
                                <td>{{$profile->city}}</td>
                            </tr>
                            <tr>
                                <td><strong>State:</strong></td>
                                <td>{{$profile->state}}</td>
                            </tr>
                            <tr>
                                <td><strong>Country:</strong></td>
                                <td>{{$profile->country}}</td>
                            </tr>
                            <tr>
                                <td><strong>Referred By:</strong></td>
                                <td>{{$profile->ref_by == 11111111 ? 'Dealclinchers' : $profile->ref_by}}</td>
                            </tr>
                            <tr>
                                <td><strong>Created At:</strong></td>
                                <td>{{$profile->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Bank Details</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>Bank Name:</strong></td>
                                <td>{{$profile->bank_name}}</td>
                            </tr>
                            <tr>
                                <td><strong>Account Name:</strong></td>
                                <td>{{$profile->acct_name}}</td>
                            </tr>
                            <tr>
                                <td><strong>Account Number:</strong></td>
                                <td>{{str_pad($profile->acct_num, 10, '0', STR_PAD_LEFT)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Referral List</h6>
            </div>
            <div class="card-body">
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
                            @foreach($myRef as $ref)
                            <tr>
                                <td>{{ $ref->ref_code }}</td>
                                <td>{{ $ref->fullname }}</td>
                                <td>{{ $ref->email }}</td>
                                <td>{{ str_pad($ref->phone, 10, '0', STR_PAD_LEFT) }}</td>
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
                <div class="row justify-content-center">{{ $myRef->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
