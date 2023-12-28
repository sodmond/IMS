@extends('layouts.app')

@section('title')
    Admin - {{ config('app.name' )}}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-o shadow-lg my-5">

                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block" style="background: url('https://source.unsplash.com/XbwHrt87mQ0/600x800'); 
                            background-position:center; background-size: cover;"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <a href="{{url('/')}}"><img src="{{ asset('img/logo.png') }}" style="width:120px;"></a>
                                    <p>&nbsp;</p>
                                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email"
                                            id="email" value="{{ old('email') }}" placeholder="Enter Email Address..." required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                                            id="password" placeholder="Password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-user btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </form>
                                <hr>
                                @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                @endif
                                <div class="text-center">
                                    <a class="small" href="{{url('/sign-up')}}">Don't have an account? Register Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
