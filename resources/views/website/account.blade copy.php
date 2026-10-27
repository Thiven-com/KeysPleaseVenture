@extends('layouts.website')

@section('content')

    <style>
        .kp-account {
            --kp-primary: #00068a;
            --kp-blue: #343de0;
            --kp-text: #111b49;
            --kp-muted: #697590;
            --kp-border: #e1e7f2;
            background: #f5f8fe;
            min-height: 80vh;
            padding-bottom: 55px;
            color: var(--kp-text);
            font-family: inherit;
        }

        .kp-account * {
            box-sizing: border-box;
        }

        .kp-account-hero {
            padding: 28px 0 24px;
            background:
                radial-gradient(ellipse at 90% 0%, #dce8ff 0%, transparent 48%),
                linear-gradient(115deg, #fff 0%, #f0f5ff 100%);
            border-bottom: 1px solid #e6edfb;
        }

        .kp-breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 12px;
            color: var(--kp-muted);
            margin-bottom: 12px;
        }

        .kp-breadcrumb a {
            color: var(--kp-primary);
            text-decoration: none;
        }

        .kp-account-hero h1 {
            font-size: clamp(26px, 3vw, 34px);
            font-weight: 800;
            letter-spacing: -.8px;
            margin: 0 0 8px;
            color: var(--kp-text);
        }

        .kp-account-hero p {
            margin: 0;
            font-size: 14px;
            color: #53658f;
        }

        .kp-account-layout {
            display: grid;
            grid-template-columns: 270px minmax(0, 1fr);
            gap: 24px;
            align-items: start;
            padding-top: 26px;
        }

        .kp-sidebar,
        .kp-panel {
            background: #fff;
            border: 1px solid var(--kp-border);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(29, 53, 112, .035);
        }

        .kp-sidebar {
            overflow: hidden;
            position: sticky;
            top: 20px;
        }

        .kp-user {
            padding: 27px 22px 23px;
        }

        .kp-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(145deg, #00068a, #4349e7);
            color: #fff;
            font-size: 29px;
            font-weight: 700;
            margin-bottom: 16px;
            box-shadow: 0 7px 18px rgba(0, 6, 138, .2);
        }

        .kp-user h3 {
            font-size: 18px;
            font-weight: 750;
            margin: 0 0 7px;
            overflow-wrap: anywhere;
        }

        .kp-user-email {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            color: var(--kp-muted);
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .kp-user-email svg {
            flex-shrink: 0;
            margin-top: 2px;
        }

        .kp-sidebar-nav {
            padding: 0 12px 14px;
        }

        .kp-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 13px 14px;
            border-radius: 9px;
            color: #475371;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 4px;
            transition: background .2s, color .2s;
        }

        .kp-nav-link svg {
            width: 19px;
            height: 19px;
            flex-shrink: 0;
        }

        .kp-nav-link:hover,
        .kp-nav-link.active {
            background: #eeefff;
            color: var(--kp-primary);
        }

        .kp-nav-link.active {
            box-shadow: inset 3px 0 #00068a;
        }

        .kp-sidebar-divider {
            height: 1px;
            background: var(--kp-border);
            margin: 12px 10px;
        }

        .kp-logout-form {
            margin: 0;
        }

        .kp-logout {
            border: 0;
            background: transparent;
            color: #d92d45;
            cursor: pointer;
        }

        .kp-logout:hover {
            background: #fff0f1;
        }

        .kp-main {
            min-width: 0;
        }

        .kp-panel {
            padding: 23px;
            margin-bottom: 18px;
            scroll-margin-top: 25px;
        }

        .kp-panel-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .kp-panel-title {
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 0;
        }

        .kp-icon-box {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #343de0;
            background: linear-gradient(140deg, #f0efff, #e7eaff);
        }

        .kp-icon-box svg {
            width: 22px;
            height: 22px;
        }

        .kp-panel-title h2 {
            font-size: 17px;
            font-weight: 750;
            margin: 0 0 5px;
            color: var(--kp-text);
        }

        .kp-panel-title p {
            font-size: 12px;
            color: var(--kp-muted);
            margin: 0;
            line-height: 1.5;
        }

        .kp-outline-btn,
        .kp-primary-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s ease;
        }

        .kp-outline-btn {
            border: 1px solid #3039d5;
            background: #fff;
            color: var(--kp-primary);
        }

        .kp-outline-btn:hover {
            background: #f0f1ff;
            color: var(--kp-primary);
        }

        .kp-primary-btn {
            border: 1px solid var(--kp-primary);
            background: var(--kp-primary);
            color: #fff;
        }

        .kp-primary-btn:hover {
            background: #00045f;
            color: #fff;
            transform: translateY(-1px);
        }

        .kp-profile-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            background: #f6f8fd;
            border-radius: 12px;
            padding: 17px 10px;
        }

        .kp-profile-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px;
            min-width: 0;
        }

        .kp-profile-item+.kp-profile-item {
            border-left: 1px solid #dce3f0;
        }

        .kp-mini-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e9edff;
            color: #303bd3;
        }

        .kp-mini-icon svg {
            width: 20px;
            height: 20px;
        }

        .kp-field-label {
            font-size: 11px;
            color: var(--kp-muted);
            margin-bottom: 6px;
        }

        .kp-field-value {
            font-size: 13px;
            font-weight: 700;
            overflow-wrap: anywhere;
            line-height: 1.5;
        }

        .kp-empty {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            padding: 24px;
            border-radius: 12px;
            background: linear-gradient(115deg, #f5f8ff, #f0f3ff);
        }

        .kp-empty-art {
            width: 88px;
            height: 88px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #545ff0;
            background: linear-gradient(145deg, #e4eaff, #fff);
            border: 1px solid #e2e8ff;
            border-radius: 22px;
        }

        .kp-empty-art svg {
            width: 43px;
            height: 43px;
        }

        .kp-empty-content h3 {
            font-size: 14px;
            font-weight: 750;
            margin: 0 0 6px;
        }

        .kp-empty-content p {
            font-size: 12px;
            color: var(--kp-muted);
            line-height: 1.6;
            margin: 0 0 12px;
        }

        .kp-subscription-status {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px;
            border-radius: 11px;
            background: linear-gradient(100deg, #eff1ff, #f6f7ff);
        }

        .kp-subscription-status .kp-icon-box {
            background: #dfe4ff;
        }

        .kp-subscription-copy {
            flex: 1;
            min-width: 0;
        }

        .kp-subscription-copy h3 {
            font-size: 13px;
            font-weight: 750;
            margin: 0 0 5px;
        }

        .kp-subscription-copy p {
            font-size: 12px;
            line-height: 1.5;
            color: var(--kp-muted);
            margin: 0;
        }

        @media (max-width: 1050px) {
            .kp-account-layout {
                grid-template-columns: 235px minmax(0, 1fr);
                gap: 17px;
            }

            .kp-profile-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .kp-profile-item+.kp-profile-item {
                border-left: 0;
                border-top: 1px solid #dce3f0;
                padding-top: 15px;
            }

            .kp-profile-item {
                padding-left: 8px;
            }
        }

        @media (max-width: 767px) {
            .kp-account-hero {
                padding: 23px 0;
            }

            .kp-account-layout {
                grid-template-columns: 1fr;
                padding-top: 18px;
            }

            .kp-sidebar {
                position: static;
            }

            .kp-user {
                display: flex;
                align-items: center;
                gap: 15px;
                padding: 19px;
            }

            .kp-avatar {
                width: 56px;
                height: 56px;
                font-size: 23px;
                margin: 0;
            }

            .kp-sidebar-nav {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 5px;
            }

            .kp-nav-link {
                margin: 0;
                padding: 12px 9px;
                font-size: 12px;
            }

            .kp-sidebar-divider {
                grid-column: 1 / -1;
            }

            .kp-logout-form {
                grid-column: 1 / -1;
            }

            .kp-panel {
                padding: 18px;
                margin-bottom: 14px;
            }
        }

        @media (max-width: 480px) {
            .kp-panel-head {
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .kp-panel-title {
                gap: 10px;
            }

            .kp-panel-title h2 {
                font-size: 15px;
            }

            .kp-panel-title p {
                font-size: 11px;
            }

            .kp-panel-head>.kp-outline-btn,
            .kp-panel-head>.kp-primary-btn {
                margin-left: 55px;
            }

            .kp-empty {
                flex-direction: column;
                text-align: center;
                gap: 15px;
                padding: 22px 15px;
            }

            .kp-empty-art {
                width: 70px;
                height: 70px;
            }

            .kp-subscription-status {
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .kp-subscription-status>.kp-outline-btn {
                margin-left: 55px;
            }

            .kp-profile-item {
                padding-left: 0;
            }
        }
    </style>

    @php
        $customer = auth('customer')->user();

        $customerName = $customer->name ?? 'Customer';
        $customerEmail = $customer->email ?? 'Email not added';
        $customerMobile = $customer->mobile
            ?? $customer->phone
            ?? 'Not provided';

        $initial = strtoupper(substr($customerName, 0, 1));
    @endphp

    <div class="kp-account">

        {{-- Page Heading --}}
        <section class="kp-account-hero">
            <div class="container">
                <div class="kp-breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span>›</span>
                    <span>My Account</span>
                </div>

                <h1>My Account</h1>
                <p>
                    Manage your Keys Please Venture account and stay updated
                    with your property journey.
                </p>
            </div>
        </section>

        <div class="container">
            <div class="kp-account-layout">

                {{-- Sidebar --}}
                <aside class="kp-sidebar">

                    <div class="kp-user">
                        <div class="kp-avatar">{{ $initial }}</div>

                        <div>
                            <h3>{{ $customerName }}</h3>

                            <div class="kp-user-email">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="m3 7 9 6 9-6" />
                                </svg>

                                <span>{{ $customerEmail }}</span>
                            </div>
                        </div>
                    </div>

                    <nav class="kp-sidebar-nav">

                        <a href="#profile" class="kp-nav-link active">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 21v-2a8 8 0 0 1 16 0v2" />
                            </svg>
                            My Profile
                        </a>

                        <a href="#enquiries" class="kp-nav-link">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="5" y="3" width="14" height="18" rx="2" />
                                <path d="M9 8h6M9 12h6M9 16h4" />
                            </svg>
                            My Enquiries
                        </a>

                        <a href="#visits" class="kp-nav-link">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="5" width="18" height="16" rx="2" />
                                <path d="M16 3v4M8 3v4M3 10h18M8 14h3M8 17h3" />
                            </svg>
                            My Site Visits
                        </a>

                        <a href="{{ route('subscription.index') }}" class="kp-nav-link">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="5" width="18" height="14" rx="2" />
                                <path d="M3 10h18" />
                            </svg>
                            My Subscription
                        </a>

                        <div class="kp-sidebar-divider"></div>

                        <form class="kp-logout-form" method="POST" action="{{ route('customer.logout') }}">
                            @csrf

                            <button type="submit" class="kp-nav-link kp-logout">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M10 17l5-5-5-5M15 12H3" />
                                    <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7" />
                                </svg>
                                Logout
                            </button>
                        </form>

                    </nav>
                </aside>

                @if (session('success'))
                    <div class="alert alert-success mb-3">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Main Dashboard --}}
                <main class="kp-main">

                    {{-- Profile --}}
                    <section class="kp-panel" id="profile">

                        <div class="kp-panel-head">
                            <div class="kp-panel-title">
                                <div class="kp-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <circle cx="12" cy="8" r="4" />
                                        <path d="M4 21v-2a8 8 0 0 1 16 0v2" />
                                    </svg>
                                </div>

                                <div>
                                    <h2>My Profile</h2>
                                    <p>View your personal information.</p>
                                </div>
                            </div>
                            <a href="{{ route('customer.profile.edit') }}" class="kp-outline-btn">
                                <i class="fas fa-pen"></i>
                                Edit Profile
                            </a>
                        </div>


                        <div class="kp-profile-grid">

                            <div class="kp-profile-item">
                                <div class="kp-mini-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <circle cx="12" cy="8" r="4" />
                                        <path d="M4 21v-2a8 8 0 0 1 16 0v2" />
                                    </svg>
                                </div>

                                <div>
                                    <div class="kp-field-label">Full Name</div>
                                    <div class="kp-field-value">
                                        {{ $customerName }}
                                    </div>
                                </div>
                            </div>

                            <div class="kp-profile-item">
                                <div class="kp-mini-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <path d="m3 7 9 6 9-6" />
                                    </svg>
                                </div>

                                <div>
                                    <div class="kp-field-label">Email Address</div>
                                    <div class="kp-field-value">
                                        {{ $customerEmail }}
                                    </div>
                                </div>
                            </div>

                            <div class="kp-profile-item">
                                <div class="kp-mini-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M22 16.9v3a2 2 0 0 1-2.2 2
                                            19.8 19.8 0 0 1-8.6-3.1
                                            19.4 19.4 0 0 1-6-6
                                            19.8 19.8 0 0 1-3.1-8.7
                                            A2 2 0 0 1 4.1 2h3
                                            a2 2 0 0 1 2 1.7
                                            c.1 1.1.4 2.1.7 3.1
                                            a2 2 0 0 1-.5 2.1L8 10.2
                                            a16 16 0 0 0 6 6l1.3-1.3
                                            a2 2 0 0 1 2.1-.5
                                            c1 .4 2 .6 3.1.7
                                            a2 2 0 0 1 1.5 1.8z" />
                                    </svg>
                                </div>

                                <div>
                                    <div class="kp-field-label">Mobile Number</div>
                                    <div class="kp-field-value">
                                        {{ $customerMobile }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>

                    {{-- Enquiries --}}
                    <section class="kp-panel" id="enquiries">

                        <div class="kp-panel-head">
                            <div class="kp-panel-title">
                                <div class="kp-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="5" y="3" width="14" height="18" rx="2" />
                                        <path d="M9 8h6M9 12h6M9 16h4" />
                                    </svg>
                                </div>

                                <div>
                                    <h2>My Enquiries</h2>
                                    <p>View your property enquiries and their status.</p>
                                </div>
                            </div>

                            <a href="#enquiries" class="kp-outline-btn">
                                View All →
                            </a>
                        </div>

                        <div class="kp-empty">
                            <div class="kp-empty-art">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M6 3h8l5 5v13H6z" />
                                    <path d="M14 3v5h5M9 12h7M9 16h7" />
                                    <path d="M3 7v14h12" />
                                </svg>
                            </div>

                            <div class="kp-empty-content">
                                <h3>No enquiries yet</h3>
                                <p>Your property enquiries will appear here.</p>

                                <a href="{{ route('home') }}" class="kp-primary-btn">
                                    Browse Properties →
                                </a>
                            </div>
                        </div>

                    </section>

                    {{-- Site Visits --}}
                    <section class="kp-panel" id="visits">

                        <div class="kp-panel-head">
                            <div class="kp-panel-title">
                                <div class="kp-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="3" y="5" width="18" height="16" rx="2" />
                                        <path d="M16 3v4M8 3v4M3 10h18" />
                                        <path d="M8 14h3M8 17h3M14 14h2" />
                                    </svg>
                                </div>

                                <div>
                                    <h2>My Site Visits</h2>
                                    <p>View your scheduled property visits.</p>
                                </div>
                            </div>

                            <a href="#visits" class="kp-outline-btn">
                                View All →
                            </a>
                        </div>

                        <div class="kp-empty">
                            <div class="kp-empty-art">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="3" y="5" width="18" height="16" rx="2" />
                                    <path d="M16 3v4M8 3v4M3 10h18" />
                                    <path d="M8 14h2M14 14h2M8 17h2" />
                                </svg>
                            </div>

                            <div class="kp-empty-content">
                                <h3>No site visits scheduled</h3>
                                <p>Your scheduled property visits will appear here.</p>

                                <a href="{{ route('home') }}" class="kp-primary-btn">
                                    Explore Properties →
                                </a>
                            </div>
                        </div>

                    </section>

                    {{-- Subscription --}}
                    <section class="kp-panel" id="subscription">

                        <div class="kp-panel-head">
                            <div class="kp-panel-title">
                                <div class="kp-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <path d="M3 10h18" />
                                    </svg>
                                </div>

                                <div>
                                    <h2>My Subscription</h2>
                                    <p>View your subscription plan and status.</p>
                                </div>
                            </div>

                            <a href="{{ route('subscription.index') }}" class="kp-primary-btn">
                                View Subscription →
                            </a>
                        </div>

                        <div class="kp-subscription-status">
                            <div class="kp-icon-box">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="m12 3 2.8 5.7 6.2.9-4.5 4.4
                                        1.1 6.2-5.6-3-5.6 3 1.1-6.2L3 9.6l6.2-.9z" />
                                </svg>
                            </div>

                            <div class="kp-subscription-copy">
                                <h3>Manage Your Subscription</h3>
                                <p>Explore available plans and subscription details.</p>
                            </div>

                            <a href="{{ route('subscription.index') }}" class="kp-outline-btn">
                                Explore Plans →
                            </a>
                        </div>

                    </section>

                </main>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.kp-sidebar-nav a[href^="#"]').forEach(link => {
            link.addEventListener('click', function () {
                document.querySelectorAll('.kp-nav-link').forEach(item => {
                    item.classList.remove('active');
                });

                this.classList.add('active');
            });
        });
    </script>

@endsection