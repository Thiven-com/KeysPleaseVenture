@extends('layout.brokermainlayout')

@section('content')

    <style>
        .broker-profile-page {
            margin-left: 95px !important;
            width: calc(100% - 95px);
            padding: 105px 25px 40px;
            background: #f5f7fb;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .broker-profile-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .broker-profile-header {
            margin-bottom: 25px;
        }

        .broker-profile-header h1 {
            margin: 0;
            color: #071b3d;
            font-size: 30px;
            font-weight: 700;
        }

        .broker-profile-header p {
            margin: 8px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .broker-profile-grid {
            display: grid;
            grid-template-columns: 300px minmax(0, 1fr);
            gap: 22px;
        }

        .broker-profile-card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 15px;
            overflow: hidden;
        }

        .broker-profile-summary {
            padding: 30px 25px;
            text-align: center;
        }

        .broker-profile-avatar {
            width: 105px;
            height: 105px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #edf3fb;
            color: #071b3d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            font-weight: 700;
            overflow: hidden;
        }

        .broker-profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .broker-profile-name {
            margin: 0;
            color: #071b3d;
            font-size: 20px;
            font-weight: 700;
        }

        .broker-profile-type {
            margin: 7px 0 0;
            color: #8a929f;
            font-size: 13px;
        }

        .broker-profile-agency {
            margin-top: 18px;
            padding: 12px;
            border: 1px solid #edf0f5;
            border-radius: 10px;
            color: #172033;
            font-size: 13px;
            font-weight: 600;
        }

        .broker-profile-section {
            padding: 25px;
        }

        .broker-profile-section+.broker-profile-section {
            border-top: 1px solid #edf0f5;
        }

        .broker-profile-section h3 {
            margin: 0;
            color: #071b3d;
            font-size: 17px;
            font-weight: 700;
        }

        .broker-profile-section p {
            margin: 5px 0 20px;
            color: #8a929f;
            font-size: 12px;
        }

        .broker-profile-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .broker-profile-info {
            padding: 15px;
            background: #f8fafc;
            border: 1px solid #edf0f5;
            border-radius: 10px;
        }

        .broker-profile-label {
            display: block;
            margin-bottom: 7px;
            color: #8a929f;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .broker-profile-value {
            color: #172033;
            font-size: 13px;
            font-weight: 600;
            word-break: break-word;
        }

        .broker-profile-full {
            grid-column: 1 / -1;
        }

        @media (max-width: 991px) {
            .broker-profile-page {
                margin-left: 0 !important;
                width: 100%;
                padding: 100px 20px 30px;
            }

            .broker-profile-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767px) {
            .broker-profile-page {
                padding: 90px 15px 25px;
            }

            .broker-profile-info-grid {
                grid-template-columns: 1fr;
            }

            .broker-profile-full {
                grid-column: auto;
            }
        }



        .broker-profile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .broker-edit-profile-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            background: #071b3d;
            color: #fff !important;
            border-radius: 9px;
            text-decoration: none !important;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .broker-edit-profile-btn:hover {
            background: #0d2d63;
            transform: translateY(-1px);
        }
    </style>


    <div class="broker-profile-page">

        <div class="broker-profile-container">

            <div class="broker-profile-header">

                <div>
                    <h1>My Profile</h1>

                    <p>
                        Manage and view your broker account information.
                    </p>
                </div>

                <a href="{{ route('broker.profile.edit') }}" class="broker-edit-profile-btn">

                    <i class="ti ti-edit"></i>

                    Edit Profile

                </a>

            </div>


            <div class="broker-profile-grid">


                {{-- PROFILE SUMMARY --}}

                <div class="broker-profile-card">

                    <div class="broker-profile-summary">

                        <div class="broker-profile-avatar">

                            @if($broker->profile_pic)

                                <img src="{{ asset('storage/' . $broker->profile_pic) }}" alt="{{ $broker->name }}">

                            @else

                                {{ strtoupper(substr($broker->name ?? 'B', 0, 1)) }}

                            @endif

                        </div>


                        <h2 class="broker-profile-name">
                            {{ $broker->name ?? 'Broker' }}
                        </h2>


                        <div class="broker-profile-type">
                            {{ $broker->broker_type ?? 'Property Broker' }}
                        </div>


                        @if($broker->agency_name)

                            <div class="broker-profile-agency">

                                <i class="ti ti-building"></i>

                                {{ $broker->agency_name }}

                            </div>

                        @endif

                    </div>

                </div>


                {{-- PROFILE INFORMATION --}}

                <div class="broker-profile-card">

                    <div class="broker-profile-section">

                        <h3>Personal Information</h3>

                        <p>
                            Your registered broker information
                        </p>


                        <div class="broker-profile-info-grid">

                            <div class="broker-profile-info">

                                <span class="broker-profile-label">
                                    Full Name
                                </span>

                                <div class="broker-profile-value">
                                    {{ $broker->name ?: 'Not provided' }}
                                </div>

                            </div>


                            <div class="broker-profile-info">

                                <span class="broker-profile-label">
                                    Email
                                </span>

                                <div class="broker-profile-value">
                                    {{ $broker->email ?: 'Not provided' }}
                                </div>

                            </div>


                            <div class="broker-profile-info">

                                <span class="broker-profile-label">
                                    Mobile
                                </span>

                                <div class="broker-profile-value">
                                    {{ $broker->mobile ?: 'Not provided' }}
                                </div>

                            </div>


                            <div class="broker-profile-info">

                                <span class="broker-profile-label">
                                    Broker Type
                                </span>

                                <div class="broker-profile-value">
                                    {{ $broker->broker_type ?: 'Not provided' }}
                                </div>

                            </div>


                            <div class="broker-profile-info">

                                <span class="broker-profile-label">
                                    License Number
                                </span>

                                <div class="broker-profile-value">
                                    {{ $broker->license_number ?: 'Not provided' }}
                                </div>

                            </div>


                            <div class="broker-profile-info">

                                <span class="broker-profile-label">
                                    Agency Name
                                </span>

                                <div class="broker-profile-value">
                                    {{ $broker->agency_name ?: 'Not provided' }}
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ADDRESS --}}

                    <div class="broker-profile-section">

                        <h3>Address Information</h3>

                        <p>
                            Your registered address details
                        </p>


                        <div class="broker-profile-info-grid">

                            <div class="broker-profile-info broker-profile-full">

                                <span class="broker-profile-label">
                                    Address
                                </span>

                                <div class="broker-profile-value">
                                    {{ $broker->address ?: 'Not provided' }}
                                </div>

                            </div>


                            <div class="broker-profile-info">

                                <span class="broker-profile-label">
                                    City
                                </span>

                                <div class="broker-profile-value">
                                    {{ $broker->city ?: 'Not provided' }}
                                </div>

                            </div>


                            <div class="broker-profile-info">

                                <span class="broker-profile-label">
                                    State
                                </span>

                                <div class="broker-profile-value">
                                    {{ $broker->state ?: 'Not provided' }}
                                </div>

                            </div>


                            <div class="broker-profile-info">

                                <span class="broker-profile-label">
                                    Pincode
                                </span>

                                <div class="broker-profile-value">
                                    {{ $broker->pincode ?: 'Not provided' }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const sidebar =
                document.getElementById('sidebar');

            const profilePage =
                document.querySelector('.broker-profile-page');

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

            document.addEventListener('click', function () {

                setTimeout(function () {
                    syncProfilePageWithSidebar();
                }, 100);

                setTimeout(function () {
                    syncProfilePageWithSidebar();
                }, 300);

            });

            window.addEventListener('resize', function () {
                syncProfilePageWithSidebar();
            });

        });
    </script>

@endsection