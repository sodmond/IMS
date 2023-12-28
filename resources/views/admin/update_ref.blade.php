@extends('layouts.admin')

@section('title') 
    Edit Profile
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Update User Profile Details</h6>
            </div>
            <div class="card-body">
                @if (count($errors))
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There are some problems with your input.<br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (isset($suc_msg))
                                    <div class="alert alert-success"><strong>Success!</strong> {{ $suc_msg }} </div>
                                @endif
                                @if (isset($err_msg))
                                    <div class="alert alert-warning"><strong>Error!</strong> {{ $err_msg }}</div>
                                @endif
                <form action="" method="post" class="user">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label font-weight-bold text-md-right">Email</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control form-control-user" name="email" id="email" value="{{$profile->email}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fullname" class="col-md-3 col-form-label font-weight-bold text-md-right">Full Name:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control form-control-user" name="fullname" id="fullname" value="{{$profile->fullname}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gneder" class="col-md-3 col-form-label font-weight-bold text-md-right">Gender:</label>
                        <div class="col-md-7">
                            <select class="form-control custom-select" id="gender" name="gender" style="border-radius: 10rem; font-size: 0.8rem; height:50px;">
                                <option value="{{$profile->gender}}" selected> -- {{$profile->gender}} -- </option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-md-3 col-form-label font-weight-bold text-md-right">Date of Birth:</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control form-control-user" name="dob" id="dob" value="{{$profile->dob}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-3 col-form-label font-weight-bold text-md-right">Phone:</label>
                        <div class="col-md-7">
                            <input type="number" class="form-control form-control-user" name="phone" id="phone" value="{{$profile->phone}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-3 col-form-label font-weight-bold text-md-right">Address:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control form-control-user" name="address" id="address" value="{{$profile->address}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-md-3 col-form-label font-weight-bold text-md-right">City:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control form-control-user" name="city" id="city" value="{{$profile->city}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="state" class="col-md-3 col-form-label font-weight-bold text-md-right">State:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control form-control-user" name="state" id="state" value="{{$profile->state}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-md-3 col-form-label font-weight-bold text-md-right">Country:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control form-control-user" name="country" id="country" value="{{$profile->country}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bank_name" class="col-md-3 col-form-label font-weight-bold text-md-right">Bank Name:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control form-control-user" name="bank_name" id="bank_name" value="{{$profile->bank_name}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="acct_num" class="col-md-3 col-form-label font-weight-bold text-md-right">Account Number:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control form-control-user" name="acct_num" id="acct_num" value="{{$profile->acct_num}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="acct_name" class="col-md-3 col-form-label font-weight-bold text-md-right">Account Name:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control form-control-user" name="acct_name" id="acct_name" value="{{$profile->acct_name}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-info btn-user btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
