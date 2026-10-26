
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

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('website/css/login.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon"
        type="image/x-icon"
        href="{{ asset('website/images/venlogo.png') }}">
</head>

<body>

    <!-- =====================================================
         LOGIN OVERLAY
    ====================================================== -->

    <div class="login-overlay"
        id="loginOverlay"
        role="dialog"
        aria-modal="true"
        aria-label="Login">

        <div class="login-modal">

            <!-- =================================================
                 LEFT BRAND PANEL
            ================================================== -->

            <section class="brand-panel">

                <div class="brand-content">

                    <h1 class="brand-title">
                        Welcome Back!
                    </h1>

                    <p class="brand-subtitle">
                        Login to continue your search
                        for the perfect rental home.
                    </p>

                </div>

                <!-- Buildings -->

                <div class="buildings">

                    <div class="building b1"></div>
                    <div class="building b2"></div>
                    <div class="building b3"></div>
                    <div class="building b4"></div>
                    <div class="building b5"></div>

                </div>

                <div class="city-ground"></div>

                <!-- Features -->

                <div class="feature-list">

                    <div class="feature">

                        <span class="feature-icon">
                            ✓
                        </span>

                        <span>
                            Verified Properties
                        </span>

                    </div>

                    <div class="feature">

                        <span class="feature-icon">
                            ✓
                        </span>

                        <span>
                            Trusted Owners
                        </span>

                    </div>

                    <div class="feature">

                        <span class="feature-icon">
                            ✓
                        </span>

                        <span>
                            Secure &amp; Transparent
                        </span>

                    </div>

                </div>

            </section>


            <!-- =================================================
                 LOGIN PANEL
            ================================================== -->

            <section class="form-panel">

                <!-- Back to Home -->

                <a href="{{ route('home') }}"
                    class="close"
                    aria-label="Back to Home">

                    &times;

                </a>


                <h2 class="form-title">
                    Login to your account
                </h2>

                <p class="form-description">
                    Please enter your details to login
                </p>


                <!-- =================================================
                     LOGIN METHOD TABS
                ================================================== -->

                <div class="login-method-tabs">

                    <button type="button"
                        class="login-method active"
                        id="mobileLoginTab">

                        Login with Mobile

                    </button>

                    <button type="button"
                        class="login-method"
                        id="emailLoginTab">

                        Login with Email

                    </button>

                </div>


                <!-- =================================================
                     MOBILE LOGIN
                ================================================== -->

                <div id="mobileLoginForm"
                    class="login-method-form active">

                    <div class="form-group">

                        <label for="loginMobile">
                            Mobile Number
                        </label>

                        <div class="mobile-row">

                            <select id="loginCountryCode"
                                name="country_code">

                                <option value="+91">
                                    +91
                                </option>

                                <option value="+1">
                                    +1
                                </option>

                                <option value="+44">
                                    +44
                                </option>

                                <option value="+61">
                                    +61
                                </option>

                            </select>

                            <input type="tel"
                                id="loginMobile"
                                name="mobile"
                                placeholder="Enter mobile number"
                                maxlength="10"
                                inputmode="numeric"
                                autocomplete="tel">

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     EMAIL LOGIN
                ================================================== -->

                <div id="emailLoginForm"
                    class="login-method-form">

                    <div class="form-group">

                        <label for="loginEmail">
                            Email Address
                        </label>

                        <input type="email"
                            id="loginEmail"
                            name="email"
                            placeholder="Enter your email address"
                            autocomplete="email">

                    </div>

                </div>


                <!-- =================================================
                     PASSWORD
                ================================================== -->

                <div class="form-group">

                    <label for="loginPassword">
                        Password
                    </label>

                    <div class="password-wrap">

                        <input type="password"
                            id="loginPassword"
                            name="password"
                            placeholder="Enter your password"
                            autocomplete="current-password">

                        <button type="button"
                            class="eye"
                            id="loginPasswordEye"
                            aria-label="Show password">

                            <i class="fa-solid fa-eye"></i>

                        </button>

                    </div>

                </div>


                <!-- Forgot Password -->

                <div class="forgot-password">

                    <a href="#">
                        Forgot Password?
                    </a>

                </div>


                <!-- =================================================
                     LOGIN BUTTON
                ================================================== -->

                <button type="button"
                    class="login-submit"
                    id="loginSubmit">

                    Login

                </button>


                <!-- =================================================
                     SOCIAL LOGIN
                ================================================== -->

                <div class="continue">
                    or continue with
                </div>

                <div class="socials">

                    <button type="button"
                        class="social google"
                        aria-label="Login with Google">

                        <i class="fa-brands fa-google"></i>

                    </button>

                    <button type="button"
                        class="social facebook"
                        aria-label="Login with Facebook">

                        <i class="fa-brands fa-facebook-f"></i>

                    </button>

                    <button type="button"
                        class="social apple"
                        aria-label="Login with Apple">

                        <i class="fa-brands fa-apple"></i>

                    </button>

                </div>

            </section>

        </div>

    </div>


    <!-- =====================================================
         TOAST
    ====================================================== -->

    <div class="toast"
        id="toast"
        aria-live="polite">

    </div>


    <!-- =====================================================
         LOGIN SCRIPT
    ====================================================== -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /*
            ==================================================
            ELEMENTS
            ==================================================
            */

            const overlay = document.getElementById('loginOverlay');

            const modal = document.querySelector('.login-modal');

            const mobileTab = document.getElementById('mobileLoginTab');

            const emailTab = document.getElementById('emailLoginTab');

            const mobileForm = document.getElementById('mobileLoginForm');

            const emailForm = document.getElementById('emailLoginForm');

            const loginMobile = document.getElementById('loginMobile');

            const loginEmail = document.getElementById('loginEmail');

            const loginPassword = document.getElementById('loginPassword');

            const loginSubmit = document.getElementById('loginSubmit');


            /*
            ==================================================
            LOGIN METHOD TABS
            ==================================================
            */

            function setLoginMethod(type) {

                if (
                    !mobileTab ||
                    !emailTab ||
                    !mobileForm ||
                    !emailForm
                ) {
                    return;
                }

                if (type === 'email') {

                    emailTab.classList.add('active');

                    mobileTab.classList.remove('active');

                    emailForm.classList.add('active');

                    mobileForm.classList.remove('active');

                    loginEmail.required = true;

                    loginMobile.required = false;

                } else {

                    mobileTab.classList.add('active');

                    emailTab.classList.remove('active');

                    mobileForm.classList.add('active');

                    emailForm.classList.remove('active');

                    loginMobile.required = true;

                    loginEmail.required = false;

                }

            }


            /*
            ==================================================
            MOBILE LOGIN TAB
            ==================================================
            */

            if (mobileTab) {

                mobileTab.addEventListener('click', function () {

                    setLoginMethod('mobile');

                });

            }


            /*
            ==================================================
            EMAIL LOGIN TAB
            ==================================================
            */

            if (emailTab) {

                emailTab.addEventListener('click', function () {

                    setLoginMethod('email');

                });

            }


            /*
            ==================================================
            PASSWORD SHOW / HIDE
            ==================================================
            */

            document.querySelectorAll('.eye').forEach(function (button) {

                button.addEventListener('click', function () {

                    const input = this
                        .closest('.password-wrap')
                        .querySelector('input');

                    if (!input) {
                        return;
                    }

                    const icon = this.querySelector('i');

                    if (input.type === 'password') {

                        input.type = 'text';

                        this.setAttribute(
                            'aria-label',
                            'Hide password'
                        );

                        if (icon) {

                            icon.classList.remove('fa-eye');

                            icon.classList.add('fa-eye-slash');

                        }

                    } else {

                        input.type = 'password';

                        this.setAttribute(
                            'aria-label',
                            'Show password'
                        );

                        if (icon) {

                            icon.classList.remove('fa-eye-slash');

                            icon.classList.add('fa-eye');

                        }

                    }

                });

            });


            /*
            ==================================================
            MOBILE NUMBER VALIDATION
            ==================================================
            */

            if (loginMobile) {

                loginMobile.addEventListener('input', function () {

                    this.value = this.value
                        .replace(/\D/g, '')
                        .slice(0, 10);

                });

            }


            /*
            ==================================================
            LOGIN
            ==================================================
            */

            if (loginSubmit) {

                loginSubmit.addEventListener('click', function () {

                    /*
                    EMAIL LOGIN
                    */

                    if (emailForm.classList.contains('active')) {

                        const email = loginEmail;

                        if (!email.value.trim()) {

                            showMessage(
                                'Please enter your email address.'
                            );

                            email.focus();

                            return;

                        }

                        const emailPattern =
                            /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                        if (
                            !emailPattern.test(
                                email.value.trim()
                            )
                        ) {

                            showMessage(
                                'Please enter a valid email address.'
                            );

                            email.focus();

                            return;

                        }

                    }


                    /*
                    MOBILE LOGIN
                    */

                    else {

                        const mobile = loginMobile;

                        if (
                            !/^[0-9]{10}$/.test(
                                mobile.value.trim()
                            )
                        ) {

                            showMessage(
                                'Please enter a valid 10-digit mobile number.'
                            );

                            mobile.focus();

                            return;

                        }

                    }


                    /*
                    PASSWORD VALIDATION
                    */

                    if (!loginPassword.value) {

                        showMessage(
                            'Please enter your password.'
                        );

                        loginPassword.focus();

                        return;

                    }


                    /*
                    FRONTEND VALIDATION ONLY
                    */

                    showMessage(
                        'Login details validated successfully.'
                    );

                    /*
                    IMPORTANT:
                    This does not authenticate the user.

                    Connect this button to your Laravel login
                    route/controller to verify credentials.
                    */

                });

            }


            /*
            ==================================================
            TOAST MESSAGE
            ==================================================
            */

            function showMessage(message) {

                const toast = document.getElementById('toast');

                if (!toast) {
                    return;
                }

                toast.textContent = message;

                toast.classList.add('show');

                clearTimeout(window.toastTimer);

                window.toastTimer = setTimeout(function () {

                    toast.classList.remove('show');

                }, 2500);

            }


            /*
            ==================================================
            MODAL SCROLL / BODY LOCK
            ==================================================
            */

            function setBodyLock(locked) {

                document.documentElement.classList.toggle(
                    'login-modal-open',
                    locked
                );

                document.body.classList.toggle(
                    'login-modal-open',
                    locked
                );

            }


            /*
            ==================================================
            INITIAL LOGIN METHOD
            ==================================================
            */

            setLoginMethod('mobile');


            /*
            ==================================================
            BODY LOCK
            ==================================================
            */

            setBodyLock(true);


            /*
            ==================================================
            OVERLAY CLICK
            ==================================================
            */

            if (overlay) {

                overlay.addEventListener('click', function (event) {

                    if (event.target === overlay) {

                        window.location.href =
                            "{{ route('home') }}";

                    }

                });

            }


            /*
            ==================================================
            ESCAPE KEY
            ==================================================
            */

            document.addEventListener('keydown', function (event) {

                if (event.key === 'Escape') {

                    window.location.href =
                        "{{ route('home') }}";

                }

            });

        });

    </script>

</body>

</html>
