@extends('layouts.email-temp')

@section('content')
<style type="text/css">
    span a img{
        width:35px;
    }
</style>
<div style="text-align: left;">
    <p>Hello {{ $fname }},</p>
    <p>A login credentials have been automtically generated for you after successful registeration on our portal. 
        See your login credentials below:
    </p>
    <p style="text-align: center;">
        <strong>Email:</strong> {{ $email }}
        <br>
        <strong>Password:</strong> {{ $pword }}
        <br>
        <a href="{{url('/login')}}">
            <button style="background:#0069D9; padding:10px 20px; border-radius:10px; border:0; color:#fff; 
            cursor:pointer;">Login</button>
        </a>
    </p>
    <div style="text-align: center;">
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