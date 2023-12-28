@extends('layouts.email-temp')

@section('content')
<?php
$fname = explode(" ", $profile['fullname']);
?>
<style type="text/css">
    span a img{
        width:35px;
    }
</style>
<div style="text-align: left;">
    <p>Hello {{ $fname[0] }},</p>
    <p>You have successfully registered on our portal. You will receive another email with your login credentials 
        before you can login to the portal. See your profile details and referral link below:</p>
    <div>
        <p><strong>Full Name:</strong> {{ $profile['fullname'] }}</p>
        <p><strong>Gender:</strong> {{ $profile['gender'] }}</p>
        <p><strong>Date of Birth:</strong> {{ $profile['dob'] }}</p>
        <p><strong>Phone:</strong> {{ $profile['phone'] }}</p>
        <p><strong>Address:</strong> {{ $profile['address'] }}</p>
        <p><strong>City:</strong> {{ $profile['city'] }}</p>
        <p><strong>State:</strong> {{ $profile['state'] }}</p>
        <p><strong>Country:</strong> {{ $profile['country'] }}</p>
        <p><strong>Account Name:</strong> {{ $profile['acct_name'] }}</p>
        <p><strong>Bank Name:</strong> {{ $profile['bank_name'] }}</p>
        <p><strong>Account Number:</strong> {{ $profile['acct_name'] }}</p>
        <hr>
    </div>
    <div style="text-align: center;">
        <p><h4>Your Referral Link</h4> <a href="{{ $ref_url }}">{{ $ref_url }}</a></p>
        <hr style="width: 50px;">
        <p>
            <h4>Join Our Social Group</h4>
            <span style="word-spacing:35px;">
                <a href="https://www.facebook.com/dealclinchersrealtors?mibextid=LQQJ4d"><img src="{{ asset('img/facebook-logo.png') }}" alt="Facebook"></a>
                <a href="https://instagram.com/dealclinchersrealtors?igshid=YmMyMTA2M2Y="><img src="{{ asset('img/instagram-logo.png') }}" alt="WhatsApp"></a>
                <a href="https://www.linkedin.com/company/dealclinchers-realtors/"><img src="{{ asset('img/linkedin-logo.png') }}" alt="Telegram"></a>
            </span>
        </p>
    </div>
</div>
@endsection