
@extends('layouts.website')

@section('content')

<style>
    .kp-edit-page {
        --kp-primary: #00068a;
        --kp-blue: #343de0;
        --kp-text: #111b49;
        --kp-muted: #697590;
        --kp-border: #e1e7f2;

        background: #f5f8fe;
        min-height: 80vh;
        padding: 35px 15px 55px;
        color: var(--kp-text);
    }

    .kp-edit-container {
        max-width: 850px;
        margin: 0 auto;
    }

    .kp-edit-breadcrumb {
        display: flex;
        gap: 9px;
        align-items: center;
        font-size: 13px;
        color: var(--kp-muted);
        margin-bottom: 22px;
    }

    .kp-edit-breadcrumb a {
        color: var(--kp-primary);
        text-decoration: none;
    }

    .kp-edit-card {
        background: #fff;
        border: 1px solid var(--kp-border);
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(29, 53, 112, .035);
        overflow: hidden;
    }

    .kp-edit-header {
        padding: 25px 28px;
        border-bottom: 1px solid var(--kp-border);
        background: linear-gradient(115deg, #fff, #f0f5ff);
    }

    .kp-edit-header h1 {
        font-size: 25px;
        font-weight: 800;
        margin: 0 0 8px;
        color: var(--kp-text);
    }

    .kp-edit-header p {
        font-size: 13px;
        line-height: 1.6;
        color: var(--kp-muted);
        margin: 0;
    }

    .kp-edit-form {
        padding: 28px;
    }

    .kp-edit-field {
        margin-bottom: 23px;
    }

    .kp-edit-label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 9px;
        color: var(--kp-text);
    }

    .kp-edit-input {
        display: block;
        width: 100%;
        min-height: 47px;
        padding: 12px 14px;
        border: 1px solid var(--kp-border);
        border-radius: 8px;
        background: #fff;
        color: var(--kp-text);
        font-size: 14px;
        outline: none;
        transition: border-color .2s, box-shadow .2s;
    }

    .kp-edit-input:focus {
        border-color: var(--kp-blue);
        box-shadow: 0 0 0 3px rgba(52, 61, 224, .08);
    }

    .kp-edit-input[readonly] {
        background: #f5f7fc;
        color: #697590;
        cursor: not-allowed;
    }

    .kp-edit-help {
        display: block;
        color: var(--kp-muted);
        font-size: 12px;
        margin-top: 7px;
        line-height: 1.5;
    }

    .kp-edit-error {
        color: #d92d45;
        font-size: 12px;
        margin-top: 6px;
    }

    .kp-edit-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px;
        padding-top: 8px;
        border-top: 1px solid var(--kp-border);
    }

    .kp-edit-save {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        padding: 12px 20px;
        background: var(--kp-primary);
        color: #fff;
        border: 1px solid var(--kp-primary);
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s ease;
    }

    .kp-edit-save:hover {
        background: #00045f;
        color: #fff;
    }

    .kp-edit-cancel {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        padding: 12px 20px;
        color: var(--kp-primary);
        background: #fff;
        border: 1px solid var(--kp-border);
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
    }

    .kp-edit-cancel:hover {
        background: #f0f1ff;
        color: var(--kp-primary);
    }

    @media (max-width: 576px) {
        .kp-edit-page {
            padding: 22px 12px 35px;
        }

        .kp-edit-header,
        .kp-edit-form {
            padding: 21px 18px;
        }

        .kp-edit-header h1 {
            font-size: 22px;
        }

        .kp-edit-actions > a,
        .kp-edit-actions > button {
            flex: 1;
        }
    }
</style>

@php
    $customer = auth('customer')->user();
@endphp

<div class="kp-edit-page">
    <div class="kp-edit-container">

        <div class="kp-edit-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>›</span>
            <a href="{{ route('customer.account') }}">My Account</a>
            <span>›</span>
            <span>Edit Profile</span>
        </div>

        <div class="kp-edit-card">

            <div class="kp-edit-header">
                <h1>Edit Profile</h1>
                <p>
                    Update your personal information for your
                    Keys Please Venture account.
                </p>
            </div>

            <form
                class="kp-edit-form"
                method="POST"
                action="{{ route('customer.profile.update') }}"
            >
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Please correct the following errors:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="kp-edit-field">
                    <label for="name" class="kp-edit-label">
                        Full Name <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="kp-edit-input @error('name') is-invalid @enderror"
                        value="{{ old('name', $customer->name) }}"
                        placeholder="Enter your full name"
                        maxlength="100"
                        autocomplete="name"
                        required
                    >

                    @error('name')
                        <div class="kp-edit-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="kp-edit-field">
                    <label for="email" class="kp-edit-label">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="kp-edit-input @error('email') is-invalid @enderror"
                        value="{{ old('email', $customer->email) }}"
                        placeholder="Enter your email address"
                        maxlength="255"
                        autocomplete="email"
                    >

                    @error('email')
                        <div class="kp-edit-error">{{ $message }}</div>
                    @enderror

                    <small class="kp-edit-help">
                        Enter a valid email address.
                    </small>
                </div>

                <div class="kp-edit-field">
                    <label for="mobile" class="kp-edit-label">
                        Mobile Number
                    </label>

                    <input
                        type="text"
                        id="mobile"
                        class="kp-edit-input"
                        value="{{ $customer->mobile ?? $customer->phone ?? '' }}"
                        readonly
                    >

                    <small class="kp-edit-help">
                        Your registered mobile number cannot be changed here.
                    </small>
                </div>

                <div class="kp-edit-actions">
                    <button type="submit" class="kp-edit-save">
                        <i class="fas fa-save"></i>
                        Save Changes
                    </button>

                    <a
                        href="{{ route('customer.account') }}"
                        class="kp-edit-cancel"
                    >
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
