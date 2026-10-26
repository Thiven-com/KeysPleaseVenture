<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Keys Please Venture</title>

    <meta name="description"
        content="Login to Keys Please Venture to continue your search for rental properties in Bangalore.">
    <meta name="author" content="Keys Please Venture">
    <meta name="robots" content="noindex, nofollow">

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('website/css/login.css') }}">

    <!-- Keep the two login steps mutually exclusive even if login.css lacks step rules. -->
    <style>
        .otp-step {
            display: none !important;
        }

        .otp-step.active {
            display: block !important;
        }

        .otp-text-button {
            appearance: none;
            -webkit-appearance: none;
            border: 0;
            background: transparent;
            color: #142b9b;
            font: inherit;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 0;
            cursor: pointer;
            text-decoration: none;
        }

        .otp-text-button:hover {
            text-decoration: underline;
        }

        .otp-text-button:disabled {
            opacity: .55;
            cursor: not-allowed;
        }

        #resendTimer {
            font-size: 12px;
            color: #64748b;
            margin-left: 8px;
        }
    </style>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/images/venlogo.png') }}">
</head>

<body>
    <!-- LOGIN OVERLAY -->
    <div class="login-overlay" id="loginOverlay" role="dialog" aria-modal="true" aria-label="Customer OTP Login">

        <div class="login-modal">

            <!-- BRAND PANEL -->
            <section class="brand-panel">
                <div class="brand-content">
                    <h1 class="brand-title">Welcome Back!</h1>
                    <p class="brand-subtitle">
                        Login to continue your search
                        for the perfect rental home.
                    </p>
                </div>

                <!-- BUILDINGS -->
                <div class="buildings">
                    <div class="building b1"></div>
                    <div class="building b2"></div>
                    <div class="building b3"></div>
                    <div class="building b4"></div>
                    <div class="building b5"></div>
                </div>

                <div class="city-ground"></div>

                <!-- FEATURES -->
                <div class="feature-list">
                    <div class="feature">
                        <span class="feature-icon">✓</span>
                        <span>Verified Properties</span>
                    </div>
                    <div class="feature">
                        <span class="feature-icon">✓</span>
                        <span>Trusted Owners</span>
                    </div>
                    <div class="feature">
                        <span class="feature-icon">✓</span>
                        <span>Secure &amp; Transparent</span>
                    </div>
                </div>
            </section>

            <!-- LOGIN PANEL -->
            <section class="form-panel">

                <!-- BACK HOME -->
                <a href="{{ route('home') }}" class="close" aria-label="Back to Home">&times;</a>

                <h2 class="form-title" id="otpTitle">Login to your account</h2>
                <p class="form-description" id="otpDescription">
                    Enter your mobile number to receive a verification code
                </p>

                <!-- VALIDATION ERRORS -->
                @if ($errors->any())
                    <div class="login-errors" style="color: #dc2626; margin-bottom: 15px;">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- SESSION MESSAGE -->
                @if (session('success'))
                    <div style="color: #16a34a; margin-bottom: 15px;">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- STEP 1: MOBILE NUMBER -->
                <div id="mobileStep" class="otp-step active">
                    <form id="requestOtpForm" action="{{ route('customer.otp.send') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="loginMobile">Mobile Number</label>

                            <div class="mobile-row">
                                <select id="loginCountryCode" name="country_code" required>
                                    <option value="+91" {{ old('country_code', '+91') == '+91' ? 'selected' : '' }}>+91
                                    </option>
                                    <option value="+1" {{ old('country_code') == '+1' ? 'selected' : '' }}>+1</option>
                                    <option value="+44" {{ old('country_code') == '+44' ? 'selected' : '' }}>+44</option>
                                    <option value="+61" {{ old('country_code') == '+61' ? 'selected' : '' }}>+61</option>
                                </select>

                                <input type="tel" id="loginMobile" name="mobile" placeholder="Enter mobile number"
                                    maxlength="10" minlength="10" inputmode="numeric" autocomplete="tel"
                                    value="{{ old('mobile') }}" required>
                            </div>
                        </div>

                        <button type="submit" class="login-submit" id="requestOtpButton">
                            Get OTP
                        </button>
                    </form>
                </div>

                <!-- STEP 2: OTP VERIFICATION -->
                <div id="otpStep" class="otp-step">
                    <form id="verifyOtpForm" action="{{ route('customer.otp.verify') }}" method="POST">
                        @csrf

                        <input type="hidden" name="mobile" id="verifyMobile">
                        <input type="hidden" name="country_code" id="verifyCountryCode">


                        <div class="form-group">

                            <label for="otpCode">
                                Enter Verification Code
                            </label>

                            <input type="text" id="otpCode" name="otp" placeholder="Enter 4-digit OTP" maxlength="4"
                                minlength="4" inputmode="numeric" autocomplete="one-time-code" pattern="[0-9]{4}"
                                required>

                        </div>


                        <div class="forgot-password">
                            <button type="button" id="changeMobileButton" class="otp-text-button">
                                Change Mobile Number
                            </button>
                        </div>

                        <button type="submit" class="login-submit" id="verifyOtpButton">
                            Verify OTP
                        </button>

                        <div class="forgot-password">
                            <button type="button" id="resendOtpButton" class="otp-text-button">
                                Resend OTP
                            </button>
                            <span id="resendTimer"></span>
                        </div>
                    </form>
                </div>

                <!-- SOCIAL LOGIN -->
                <!-- <div class="continue">or continue with</div>

                <div class="socials">
                    <button type="button" class="social google" aria-label="Login with Google">
                        <i class="fa-brands fa-google"></i>
                    </button>
                    <button type="button" class="social facebook" aria-label="Login with Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </button>
                    <button type="button" class="social apple" aria-label="Login with Apple">
                        <i class="fa-brands fa-apple"></i>
                    </button>
                </div> -->
            </section>
        </div>
    </div>

    <!-- TOAST -->
    <div class="toast" id="toast" aria-live="polite"></div>

    <!-- OTP SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            'use strict';

            /* ELEMENTS */
            const overlay = document.getElementById('loginOverlay');
            const mobileStep = document.getElementById('mobileStep');
            const otpStep = document.getElementById('otpStep');
            const loginMobile = document.getElementById('loginMobile');
            const countryCode = document.getElementById('loginCountryCode');
            const verifyMobile = document.getElementById('verifyMobile');
            const verifyCountryCode = document.getElementById('verifyCountryCode');
            const otpCode = document.getElementById('otpCode');
            const requestOtpForm = document.getElementById('requestOtpForm');
            const verifyOtpForm = document.getElementById('verifyOtpForm');
            const requestOtpButton = document.getElementById('requestOtpButton');
            const verifyOtpButton = document.getElementById('verifyOtpButton');
            const resendOtpButton = document.getElementById('resendOtpButton');
            const changeMobileButton = document.getElementById('changeMobileButton');
            const otpTitle = document.getElementById('otpTitle');
            const otpDescription = document.getElementById('otpDescription');
            const resendTimer = document.getElementById('resendTimer');

            /* TOAST MESSAGE */
            function showMessage(message) {
                const toast = document.getElementById('toast');

                if (!toast) return;

                toast.textContent = message;
                toast.classList.add('show');

                clearTimeout(window.toastTimer);
                window.toastTimer = setTimeout(function () {
                    toast.classList.remove('show');
                }, 3000);
            }

            /* SHOW MOBILE STEP */
            function showMobileStep() {
                mobileStep.classList.add('active');
                otpStep.classList.remove('active');

                otpTitle.textContent = 'Login to your account';
                otpDescription.textContent =
                    'Enter your mobile number to receive a verification code';

                if (requestOtpButton) {
                    requestOtpButton.disabled = false;
                    requestOtpButton.textContent = 'Get OTP';
                }
                if (resendOtpButton) {
                    resendOtpButton.disabled = false;
                    resendOtpButton.textContent = 'Resend OTP';
                }
                if (loginMobile) setTimeout(() => loginMobile.focus(), 0);
            }

            /* SHOW OTP STEP */
            function showOtpStep() {
                mobileStep.classList.remove('active');
                otpStep.classList.add('active');

                otpTitle.textContent = 'Verify your mobile';
                otpDescription.textContent =
                    'Enter the verification code sent to your mobile';

                if (otpCode) {
                    otpCode.value = '';
                    otpCode.focus();
                }

                if (requestOtpButton) {
                    requestOtpButton.disabled = false;
                    requestOtpButton.textContent = 'Get OTP';
                }
            }

            /* MOBILE VALIDATION */
            if (loginMobile) {
                loginMobile.addEventListener('input', function () {
                    this.value = this.value.replace(/\D/g, '').slice(0, 10);
                });
            }

            /* OTP VALIDATION */

            if (otpCode) {
                otpCode.addEventListener('input', function () {
                    this.value = this.value
                        .replace(/\D/g, '')
                        .slice(0, 4);
                });
            }


            /*
             * REQUEST OTP
             * The form submits to Laravel. Laravel must redirect back with
             * session('otp_sent') = true after OTP is successfully sent.
             */
            if (requestOtpForm) {
                requestOtpForm.addEventListener('submit', function (event) {
                    const mobile = loginMobile.value.trim();

                    if (!/^[0-9]{10}$/.test(mobile)) {
                        event.preventDefault();
                        showMessage('Please enter a valid 10-digit mobile number.');
                        loginMobile.focus();
                        return;
                    }

                    verifyMobile.value = mobile;
                    verifyCountryCode.value = countryCode.value;

                    requestOtpButton.disabled = true;
                    requestOtpButton.textContent = 'Sending OTP...';
                });
            }

            /* VERIFY OTP */

            if (verifyOtpForm) {
                verifyOtpForm.addEventListener('submit', function (event) {

                    const otp = otpCode.value.trim();

                    if (!/^[0-9]{4}$/.test(otp)) {

                        event.preventDefault();

                        showMessage(
                            'Please enter a valid 4-digit OTP.'
                        );

                        otpCode.focus();

                        return;
                    }

                    verifyOtpButton.disabled = true;

                    verifyOtpButton.textContent = 'Verifying...';

                });
            }


            /* CHANGE MOBILE NUMBER */
            if (changeMobileButton) {
                changeMobileButton.addEventListener('click', function () {
                    showMobileStep();
                });
            }

            /*
             * RESEND OTP
             * Uses the same Laravel OTP-send route with the saved mobile number.
             */
            if (resendOtpButton) {
                resendOtpButton.addEventListener('click', function () {
                    const mobile = verifyMobile.value;
                    const code = verifyCountryCode.value;

                    if (!mobile || !code) {
                        showMessage('Please enter your mobile number again.');
                        showMobileStep();
                        return;
                    }

                    resendOtpButton.disabled = true;
                    resendOtpButton.textContent = 'Sending...';

                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = "{{ route('customer.otp.send') }}";

                    const csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = "{{ csrf_token() }}";
                    form.appendChild(csrf);

                    const mobileInput = document.createElement('input');
                    mobileInput.type = 'hidden';
                    mobileInput.name = 'mobile';
                    mobileInput.value = mobile;
                    form.appendChild(mobileInput);

                    const codeInput = document.createElement('input');
                    codeInput.type = 'hidden';
                    codeInput.name = 'country_code';
                    codeInput.value = code;
                    form.appendChild(codeInput);

                    document.body.appendChild(form);
                    form.submit();
                });
            }

            /* MODAL BODY LOCK */
            document.documentElement.classList.add('login-modal-open');
            document.body.classList.add('login-modal-open');

            /* OVERLAY CLICK */
            if (overlay) {
                overlay.addEventListener('click', function (event) {
                    if (event.target === overlay) {
                        window.location.href = "{{ route('home') }}";
                    }
                });
            }

            /* ESCAPE KEY */
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    window.location.href = "{{ route('home') }}";
                }
            });

            /* SESSION MESSAGES */
            @if (session('success'))
                showMessage(@json(session('success')));
            @endif

            @if (session('error'))
                showMessage(@json(session('error')));
            @endif

            /*
             * RESTORE OTP STEP AFTER LARAVEL REDIRECT.
             * IMPORTANT: Do not call showMobileStep() after this condition,
             * because it would hide the OTP screen again.
             */
            @if (session('otp_sent'))
                verifyMobile.value = @json(session('otp_mobile'));
                verifyCountryCode.value = @json(session('otp_country_code'));
                showOtpStep();
            @else
                showMobileStep();
            @endif
        });
    </script>
</body>

</html>