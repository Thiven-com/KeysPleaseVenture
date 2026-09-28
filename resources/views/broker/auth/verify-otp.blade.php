<?php $page = 'signin-2'; ?>
@extends('layout.brokermainlayout')
@section('content')
    <div class="account-content">
        <div class="row login-wrapper m-0">
            <div class="col-lg-6 p-0">

                <div class="login-content">
                    <form method="POST" action="{{ route('broker.password.verifyOtp') }}">
                        @csrf

                        <div class="login-userset">

                            <div class="login-userheading">
                                <h3>Verify OTP</h3>
                                <h4>Enter the OTP sent to your email</h4>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <input type="hidden" name="email" value="{{ session('broker_email') }}">

                            <div class="mb-3">
                                <label class="form-label">OTP Code</label>

                                <div class="input-group">
                                    <input type="text" class="form-control border-end-0 @error('otp') is-invalid @enderror"
                                        name="otp" placeholder="Enter 6-digit OTP" maxlength="6" required>

                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-key"></i>
                                    </span>
                                </div>

                                @error('otp')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-login">
                                <button type="submit" class="btn btn-login">
                                    Verify OTP
                                </button>
                            </div>

                            <div class="signinform text-center">
                                <h4>
                                    Didn't receive OTP?
                                    <a href="{{ route('broker.password.request') }}" class="hover-a">
                                        Try Again
                                    </a>
                                </h4>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 p-0">
                <div class="login-img">
                    <img src="{{ asset('website') }}/images/sollog.png" alt="img">
                </div>
            </div>
        </div>
    </div>
@endsection