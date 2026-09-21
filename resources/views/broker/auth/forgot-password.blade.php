<?php $page = 'signin-2'; ?>

@extends('layout.brokermainlayout')

@section('content')

    <div class="account-content">

        <div class="row login-wrapper m-0">

            <div class="col-lg-6 p-0">

                <div class="login-content">

                    <form method="POST" action="{{ route('broker.password.sendOtp') }}">

                        @csrf

                        <div class="login-userset">

                            <div class="final-logo logo-normal">

                                <a href="{{ url('broker/dashboard') }}" class="logo logo-normal d-flex align-items-center">

                                    <img src="{{ asset('website/images/solarlogo.png') }}" alt="Logo"
                                        style="width:400px; margin-left:30px;">

                                </a>

                            </div>

                            <div class="login-userheading">

                                <h3>Forgot Password</h3>

                                <p>Enter your registered email to receive an OTP.</p>

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

                            <div class="mb-3">

                                <label class="form-label">
                                    Email Address
                                </label>

                                <div class="input-group">

                                    <input type="email" class="form-control border-end-0" name="email"
                                        value="{{ old('email') }}" placeholder="Enter your email" required>

                                    <span class="input-group-text border-start-0">

                                        <i class="ti ti-mail"></i>

                                    </span>

                                </div>

                            </div>

                            <div class="form-login">

                                <button type="submit" class="btn btn-login">

                                    Send OTP

                                </button>

                            </div>

                            <div class="mt-3 text-center">

                                <a href="{{ route('broker.login') }}">

                                    Back to Login

                                </a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <div class="col-lg-6 p-0">

                <div class="login-img">

                    <img src="{{ asset('website/images/sollog.png') }}" alt="img">

                </div>

            </div>

        </div>

    </div>

@endsection