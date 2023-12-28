@extends('layouts.app')

@section('title')
    Sign Up - Dealclinchers Realtors Limited
@endsection

@section('content')
<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" style="background:url('https://source.unsplash.com/RFDP7_80v5A/600x1200'); 
                                background-position:center; background-size: cover;"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <a href="{{url('/')}}"><img src="{{ asset('img/logo.png') }}" style="width:120px;"></a>
                                <p>&nbsp;</p>
                                <h1 class="h4 text-gray-900 mb-4">Register for Free!</h1>
                                <div class="text-gray-700 mb-4">
                                    <em>Referred by:</em> <strong>{{ $res_name ?? "Dealclinchers" }}</strong>
                                </div>
                            </div>
                            
                            <form action="" method="get" id="email-check" class="user">
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
                                    <div class="alert alert-success"><strong>Success!</strong> {{ $suc_msg }} 
                                        <br><a href="{{$ref_link}}" target="_blank">{{ $ref_link }}</a></div>
                                @endif
                                @if (isset($err_msg))
                                    <div class="alert alert-warning"><strong>Error!</strong> {{ $err_msg }}</div>
                                @endif

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="chk-email" id="chk-email" placeholder="Enter email" required autofocus>
                                </div>
                                <button type="submit" class="btn btn-info btn-user btn-block" id="chk-email-btn">
                                    Check Email Availabilty
                                </button>
                                <!-- Loader and Email Availability message starts here -->
                                <div id="email-chckin" style="text-align: center; padding: 10px;">
                                    <div><img src="{{ asset('/img/loader2.gif') }}" style="width:20px;"> Checking email availability...</div>
                                </div>
                            </form>

                            <!-- Main registration starts here -->
                            <form action="{{ url('/sign-up') }}" method="post" id="signup-form" class="user">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="ref_by" value="{{ $res_code ?? '11111111' }}">
                                <div class="form-group">
                                    <label for="email" style="font-weight:600;">Email:</label>
                                    <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email*" required readonly>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md">
                                        <label for="fullname" style="font-weight:600;">Fullname:</label>
                                        <input type="text" class="form-control form-control-user" name="fullname" id="fullname" placeholder="Enter fullname*" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md" class="input-group">
                                        <label for="gender" style="font-weight:600;">Gender:</label>
                                        <select class="form-control custom-select" id="gender" name="gender" style="border-radius: 10rem; font-size: 0.8rem; height:50px;">
                                            <option value="" selected> - - - Select Gender - - - </option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md">
                                        <label for="dob" style="font-weight:600;">Date of Birth:</label>
                                        <input type="date" class="form-control form-control-user" name="dob" id="dob" placeholder="Date Of Birth*" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" style="font-weight:600;">Phone:</label>
                                    <input type="number" class="form-control form-control-user" name="phone" id="phone" placeholder="Phone*" required>
                                </div>
                                <div class="form-group">
                                    <label for="address" style="font-weight:600;">Address:</label>
                                    <input type="text" class="form-control form-control-user" name="address" id="address" placeholder="Address*" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md">
                                        <label for="city" style="font-weight:600;">City:</label>
                                        <input type="text" class="form-control form-control-user" name="city" id="city" placeholder="City*" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="state" style="font-weight:600;">State:</label>
                                        <input type="text" class="form-control form-control-user" name="state" id="state" placeholder="State*" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country" style="font-weight:600;">Country:</label>
                                    <input type="text" class="form-control form-control-user" name="country" id="country" placeholder="Country*" required>
                                </div>
                                <div class="form-group">
                                    <label for="acct_name" style="font-weight:600;">Account Name:</label>
                                    <input type="text" class="form-control form-control-user" name="acct_name" id="acct_name" placeholder="Account Name*" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md">
                                        <label for="bank_name" style="font-weight:600;">Bank Name:</label>
                                        <input type="text" class="form-control form-control-user" name="bank_name" id="bank_name" placeholder="Bank Name*" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="acct_num" style="font-weight:600;">Account Number:</label>
                                        <input type="number" class="form-control form-control-user" name="acct_num" id="acct_num" placeholder="Account Number*" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-user btn-block">Submit</button>
                            </form>
                            
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{url('/login')}}">Already have an account? Login!</a>
                            </div>
                            <input type="hidden" id="chk-email-url" value="{{ url('/') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('#signup-form').css('display', 'none');
        $('#email-chckin').css('display', 'none');
        //alert($('#chk-email-url').val());
        $('#email-check').submit(function(e){
            e.preventDefault();
            var email = $('#chk-email').val();
            $('#chk-email-btn').attr('disabled');
            $('#email-chckin').css('display', 'block');
            $.ajax({
                type: 'GET',
                url: $('#chk-email-url').val() + '/checkCust/' + email,
                success: function(data){
                    if ($.isEmptyObject(data.error)) {
                        alert('Oops! Email not available');
                        //$('#email-chckin').css('display', 'none');
                        $('#chk-email-btn').removeAttr('disabled');
                        var refLink = $('#chk-email-url').val() + '/sign-up/' + data.cust.id + '-' + data.cust.ref_code;
                        $('#email-chckin').html('<p>You already registered. See your referral link below:<br> <a href="'+refLink+'" target="_blank">'+refLink+'</a></p>');
                    } else {
                        alert(data.error);
                        $('#email-check').css('display', 'none');
                        $('#email-chckin').css('display', 'none');
                        $('#signup-form').css('display', 'block');
                        $('#email').val(email);
                    }
                }
            });
        });
        $('#fullname').blur(function(){
            let fullname = $(this).val();
            const name = fullname.split(" ");
            if (typeof name[1] == "undefined" || name[1] == ""){
                alert('Please type your fullname correctly!'); 
                $(this).val("");
            }
        });
    });
</script>
@endsection