@extends('layout.brokermainlayout')

@section('content')

<style>
    .broker-edit-profile-page {
        margin-left: 95px !important;
        width: calc(100% - 95px);
        padding: 105px 25px 40px;
        background: #f5f7fb;
        min-height: 100vh;
        box-sizing: border-box;
    }

    .broker-edit-profile-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    .broker-edit-header {
        margin-bottom: 25px;
    }

    .broker-edit-header h1 {
        margin: 0;
        color: #071b3d;
        font-size: 30px;
        font-weight: 700;
    }

    .broker-edit-header p {
        margin: 8px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .broker-edit-card {
        background: #fff;
        border: 1px solid #e8edf4;
        border-radius: 15px;
        overflow: hidden;
    }

    .broker-edit-section {
        padding: 25px;
    }

    .broker-edit-section + .broker-edit-section {
        border-top: 1px solid #edf0f5;
    }

    .broker-edit-section h3 {
        margin: 0;
        color: #071b3d;
        font-size: 17px;
        font-weight: 700;
    }

    .broker-edit-section-description {
        margin: 5px 0 22px;
        color: #8a929f;
        font-size: 12px;
    }

    .broker-edit-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .broker-form-group {
        display: flex;
        flex-direction: column;
    }

    .broker-form-group.full {
        grid-column: 1 / -1;
    }

    .broker-form-label {
        margin-bottom: 7px;
        color: #374151;
        font-size: 12px;
        font-weight: 600;
    }

    .broker-form-input,
    .broker-form-select,
    .broker-form-textarea {
        width: 100%;
        padding: 11px 13px;
        border: 1px solid #dfe5ec;
        border-radius: 9px;
        background: #fff;
        color: #172033;
        font-size: 13px;
        outline: none;
        box-sizing: border-box;
        transition: .2s ease;
    }

    .broker-form-input:focus,
    .broker-form-select:focus,
    .broker-form-textarea:focus {
        border-color: #071b3d;
        box-shadow: 0 0 0 3px rgba(7, 27, 61, .06);
    }

    .broker-form-textarea {
        min-height: 100px;
        resize: vertical;
    }

    .broker-profile-photo-area {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .broker-edit-avatar {
        width: 90px;
        height: 90px;
        min-width: 90px;
        border-radius: 50%;
        overflow: hidden;
        background: #edf3fb;
        color: #071b3d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        font-weight: 700;
    }

    .broker-edit-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .broker-photo-input {
        flex: 1;
    }

    .broker-photo-input input {
        width: 100%;
        font-size: 12px;
    }

    .broker-photo-help {
        margin-top: 6px;
        color: #8a929f;
        font-size: 11px;
    }

    .broker-form-error {
        margin-top: 5px;
        color: #dc3545;
        font-size: 11px;
    }

    .broker-edit-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        padding: 20px 25px;
        border-top: 1px solid #edf0f5;
        background: #fafbfd;
    }

    .broker-cancel-btn,
    .broker-save-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 11px 18px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none !important;
        cursor: pointer;
    }

    .broker-cancel-btn {
        border: 1px solid #dfe5ec;
        background: #fff;
        color: #374151 !important;
    }

    .broker-save-btn {
        border: 0;
        background: #071b3d;
        color: #fff;
    }

    .broker-save-btn:hover {
        background: #0d2d63;
    }

    @media (max-width: 991px) {
        .broker-edit-profile-page {
            margin-left: 0 !important;
            width: 100%;
            padding: 100px 20px 30px;
        }
    }

    @media (max-width: 767px) {
        .broker-edit-profile-page {
            padding: 90px 15px 25px;
        }

        .broker-edit-grid {
            grid-template-columns: 1fr;
        }

        .broker-form-group.full {
            grid-column: auto;
        }

        .broker-profile-photo-area {
            align-items: flex-start;
            flex-direction: column;
        }

        .broker-edit-footer {
            flex-direction: column-reverse;
        }

        .broker-cancel-btn,
        .broker-save-btn {
            width: 100%;
        }
    }
</style>


<div class="broker-edit-profile-page">

    <div class="broker-edit-profile-container">

        <div class="broker-edit-header">

            <h1>Edit Profile</h1>

            <p>
                Update your broker account information.
            </p>

        </div>


        <div class="broker-edit-card">

            <form
                action="{{ route('broker.profile.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                {{-- PROFILE PHOTO --}}

                <div class="broker-edit-section">

                    <h3>Profile Photo</h3>

                    <p class="broker-edit-section-description">
                        Upload a professional profile photo.
                    </p>


                    <div class="broker-profile-photo-area">

                        <div class="broker-edit-avatar">

                            @if($broker->profile_pic)

                                <img
                                    src="{{ asset($broker->profile_pic) }}"
                                    alt="{{ $broker->name }}"
                                >

                            @else

                                {{ strtoupper(substr($broker->name ?? 'B', 0, 1)) }}

                            @endif

                        </div>


                        <div class="broker-photo-input">

                            <input
                                type="file"
                                name="profile_pic"
                                accept="image/jpeg,image/png,image/webp"
                            >

                            <div class="broker-photo-help">
                                JPG, PNG or WEBP. Maximum size: 2MB.
                            </div>

                            @error('profile_pic')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- PERSONAL INFORMATION --}}

                <div class="broker-edit-section">

                    <h3>Personal Information</h3>

                    <p class="broker-edit-section-description">
                        Update your basic broker information.
                    </p>


                    <div class="broker-edit-grid">

                        <div class="broker-form-group">

                            <label class="broker-form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="broker-form-input"
                                value="{{ old('name', $broker->name) }}"
                                required
                            >

                            @error('name')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="broker-form-group">

                            <label class="broker-form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="broker-form-input"
                                value="{{ old('email', $broker->email) }}"
                                required
                            >

                            @error('email')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="broker-form-group">

                            <label class="broker-form-label">
                                Mobile
                            </label>

                            <input
                                type="text"
                                name="mobile"
                                class="broker-form-input"
                                value="{{ old('mobile', $broker->mobile) }}"
                            >

                            @error('mobile')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="broker-form-group">

                            <label class="broker-form-label">
                                Broker Type
                            </label>

                            <input
                                type="text"
                                name="broker_type"
                                class="broker-form-input"
                                value="{{ old('broker_type', $broker->broker_type) }}"
                            >

                            @error('broker_type')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="broker-form-group">

                            <label class="broker-form-label">
                                Agency Name
                            </label>

                            <input
                                type="text"
                                name="agency_name"
                                class="broker-form-input"
                                value="{{ old('agency_name', $broker->agency_name) }}"
                            >

                            @error('agency_name')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="broker-form-group">

                            <label class="broker-form-label">
                                License Number
                            </label>

                            <input
                                type="text"
                                name="license_number"
                                class="broker-form-input"
                                value="{{ old('license_number', $broker->license_number) }}"
                            >

                            @error('license_number')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- ADDRESS --}}

                <div class="broker-edit-section">

                    <h3>Address Information</h3>

                    <p class="broker-edit-section-description">
                        Update your registered address.
                    </p>


                    <div class="broker-edit-grid">

                        <div class="broker-form-group full">

                            <label class="broker-form-label">
                                Address
                            </label>

                            <textarea
                                name="address"
                                class="broker-form-textarea"
                            >{{ old('address', $broker->address) }}</textarea>

                            @error('address')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="broker-form-group">

                            <label class="broker-form-label">
                                City
                            </label>

                            <input
                                type="text"
                                name="city"
                                class="broker-form-input"
                                value="{{ old('city', $broker->city) }}"
                            >

                            @error('city')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="broker-form-group">

                            <label class="broker-form-label">
                                State
                            </label>

                            <input
                                type="text"
                                name="state"
                                class="broker-form-input"
                                value="{{ old('state', $broker->state) }}"
                            >

                            @error('state')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="broker-form-group">

                            <label class="broker-form-label">
                                Pincode
                            </label>

                            <input
                                type="text"
                                name="pincode"
                                class="broker-form-input"
                                value="{{ old('pincode', $broker->pincode) }}"
                            >

                            @error('pincode')
                                <div class="broker-form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- FOOTER --}}

                <div class="broker-edit-footer">

                    <a
                        href="{{ route('broker.profile') }}"
                        class="broker-cancel-btn"
                    >
                        Cancel
                    </a>


                    <button
                        type="submit"
                        class="broker-save-btn"
                    >
                        <i class="ti ti-device-floppy"></i>
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const sidebar =
            document.getElementById('sidebar');

        const profilePage =
            document.querySelector('.broker-edit-profile-page');

        if (!sidebar || !profilePage) {
            return;
        }

        function syncProfilePageWithSidebar() {

            if (window.innerWidth <= 991) {

                profilePage.style.setProperty(
                    'margin-left',
                    '0px',
                    'important'
                );

                profilePage.style.setProperty(
                    'width',
                    '100%',
                    'important'
                );

                return;
            }

            const sidebarWidth =
                Math.round(
                    sidebar.getBoundingClientRect().width
                );

            profilePage.style.setProperty(
                'margin-left',
                sidebarWidth + 'px',
                'important'
            );

            profilePage.style.setProperty(
                'width',
                'calc(100% - ' + sidebarWidth + 'px)',
                'important'
            );
        }

        syncProfilePageWithSidebar();

        if (typeof ResizeObserver !== 'undefined') {

            const observer =
                new ResizeObserver(function () {
                    syncProfilePageWithSidebar();
                });

            observer.observe(sidebar);
        }

        window.addEventListener('resize', function () {
            syncProfilePageWithSidebar();
        });

    });
</script>

@endsection