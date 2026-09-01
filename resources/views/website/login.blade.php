<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rental Properties in Bangalore | Keys Please Venture</title>

    <meta name="description"
        content="Explore verified rental properties in Bangalore including apartments, flats, villas, houses and commercial spaces. Search by location, property type and budget with Keys Please Venture.">

    <meta name="keywords"
        content="rental properties in Bangalore, properties for rent in Bangalore, apartments for rent Bangalore, flats for rent Bangalore, houses for rent Bangalore, villas for rent Bangalore, rental homes Bangalore, commercial properties for rent Bangalore, furnished flats Bangalore, semi furnished apartments Bangalore, Bangalore real estate, property rental Bangalore, Keys Please Venture">

    <meta name="author" content="Keys Please Venture">

    <meta name="robots" content="index, follow, max-image-preview:large">

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('website/css/login.css') }}">

    
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/images/venlogo.png') }}">
</head>

<body>

    <!-- =====================================================
         LOGIN / REGISTER OVERLAY
    ====================================================== -->

    <div class="login-overlay" id="loginOverlay" role="dialog" aria-modal="true" aria-label="Login and registration">

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
                            Trusted Brokers
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

                <a href="{{ route('home') }}" class="close" aria-label="Back to Home">
                    &times;
                </a>


                <h2 class="form-title">
                    Login to your account
                </h2>

                <p class="form-description">
                    Please enter your details to login
                </p>


                <!-- Login Method Tabs -->

                <div class="login-method-tabs">

                    <button type="button" class="login-method active" id="mobileLoginTab">

                        Login with Mobile

                    </button>


                    <button type="button" class="login-method" id="emailLoginTab">

                        Login with Email

                    </button>

                </div>


                <!-- =================================================
                     MOBILE LOGIN
                ================================================== -->

                <div id="mobileLoginForm" class="login-method-form active">

                    <div class="form-group">

                        <label for="loginMobile">
                            Mobile Number
                        </label>

                        <div class="mobile-row">

                            <select id="loginCountryCode" name="country_code">

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


                            <input type="tel" id="loginMobile" name="mobile" placeholder="Enter mobile number"
                                maxlength="10" inputmode="numeric" autocomplete="tel">

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     EMAIL LOGIN
                ================================================== -->

                <div id="emailLoginForm" class="login-method-form">

                    <div class="form-group">

                        <label for="loginEmail">
                            Email Address
                        </label>

                        <input type="email" id="loginEmail" name="email" placeholder="Enter your email address"
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

                        <input type="password" id="loginPassword" name="password" placeholder="Enter your password"
                            autocomplete="current-password">

                        <button type="button" class="eye" id="loginPasswordEye" aria-label="Show password">
                            <i class="fa-solid fa-eye"></i>
                        </button>

                    </div>

                </div>


                <!-- Login Button -->

                <button type="button" class="login-submit" id="loginSubmit">

                    Login

                </button>


                <!-- Social Login -->

                <div class="continue">
                    or continue with
                </div>


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

                </div>


                <!-- Register -->

                <div class="register">

                    Don't have an account?

                    <button type="button" id="showRegister">

                        Register Now

                    </button>

                </div>

            </section>


            <!-- =================================================
                 REGISTER PANEL
            ================================================== -->

            <section class="register-panel">

                <!-- Back to Home -->

                <a href="{{ route('home') }}" class="close register-close" aria-label="Back to Home">

                    &times;

                </a>


                <h2 class="form-title">
                    Create your account
                </h2>

                <p class="form-description">
                    Register with Keys Please Venture
                </p>


                <!-- Register Type -->

                <div class="register-tabs">

                    <button type="button" class="register-tab active" data-register-type="tenant">

                        Tenant

                    </button>


                    <button type="button" class="register-tab" data-register-type="owner">

                        Owner / Broker

                    </button>

                </div>


                <!-- Register Form -->

                <form class="register-form" id="registerForm">


                    <!-- Full Name -->

                    <div class="form-group">

                        <label for="registerName">
                            Full Name
                        </label>

                        <input id="registerName" name="name" type="text" placeholder="Enter your full name"
                            autocomplete="name" required>

                    </div>


                    <!-- Email -->

                    <div class="form-group">

                        <label for="registerEmail">
                            Email Address
                        </label>

                        <input id="registerEmail" name="email" type="email" placeholder="Enter your email address"
                            autocomplete="email" required>

                    </div>


                    <!-- Mobile -->

                    <div class="form-group">

                        <label for="registerMobile">
                            Mobile Number
                        </label>

                        <div class="mobile-row">

                            <select class="country" name="country_code">

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


                            <input id="registerMobile" name="mobile" type="tel" inputmode="numeric" maxlength="10"
                                placeholder="Enter mobile number" autocomplete="tel" required>

                        </div>

                    </div>


                    <!-- Password -->

                    <div class="form-group">

                        <label for="registerPassword">
                            Password
                        </label>

                        <div class="password-wrap">

                            <input id="registerPassword" name="password" type="password" placeholder="Create a password"
                                autocomplete="new-password" required>

                            <button class="eye" type="button" aria-label="Show password">
                                <i class="fa-solid fa-eye"></i>
                            </button>

                        </div>

                    </div>


                    <!-- Confirm Password -->

                    <div class="form-group">

                        <label for="confirmPassword">
                            Confirm Password
                        </label>

                        <div class="password-wrap">

                            <input id="confirmPassword" name="password_confirmation" type="password"
                                placeholder="Confirm your password" autocomplete="new-password" required>

                            <button class="eye" type="button" aria-label="Show password">
                                <i class="fa-solid fa-eye"></i>
                            </button>

                        </div>

                    </div>


                    <!-- Terms -->

                    <label class="terms">

                        <input type="checkbox" name="terms" required>

                        <span>

                            I agree to the

                            <a href="#">
                                Terms &amp; Conditions
                            </a>

                            and

                            <a href="#">
                                Privacy Policy
                            </a>

                        </span>

                    </label>


                    <!-- Register Button -->

                    <button class="register-submit" type="submit">

                        Create Account

                    </button>

                </form>


                <!-- Login -->

                <div class="already-account">

                    Already have an account?

                    <button type="button" id="showLogin">

                        Login Now

                    </button>

                </div>

            </section>

        </div>

    </div>


    <!-- Toast -->

    <div class="toast" id="toast" aria-live="polite">
    </div>


    <!-- =====================================================
         LOGIN / REGISTER SCRIPT
    ====================================================== -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /* =================================================
               ELEMENTS
            ================================================= */

            const overlay =
                document.getElementById('loginOverlay');

            const modal =
                document.querySelector('.login-modal');

            const formPanel =
                document.querySelector('.form-panel');

            const registerPanel =
                document.querySelector('.register-panel');

            const showRegister =
                document.getElementById('showRegister');

            const showLogin =
                document.getElementById('showLogin');


            /* =================================================
               LOGIN TABS
            ================================================= */

            const mobileTab =
                document.getElementById('mobileLoginTab');

            const emailTab =
                document.getElementById('emailLoginTab');

            const mobileForm =
                document.getElementById('mobileLoginForm');

            const emailForm =
                document.getElementById('emailLoginForm');


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

                    document.getElementById(
                        'loginEmail'
                    ).required = true;

                    document.getElementById(
                        'loginMobile'
                    ).required = false;

                } else {

                    mobileTab.classList.add('active');
                    emailTab.classList.remove('active');

                    mobileForm.classList.add('active');
                    emailForm.classList.remove('active');

                    document.getElementById(
                        'loginMobile'
                    ).required = true;

                    document.getElementById(
                        'loginEmail'
                    ).required = false;

                }

            }


            if (mobileTab) {
                mobileTab.addEventListener(
                    'click',
                    function () {
                        setLoginMethod('mobile');
                    }
                );
            }


            if (emailTab) {
                emailTab.addEventListener(
                    'click',
                    function () {
                        setLoginMethod('email');
                    }
                );
            }


            /* =================================================
               SHOW REGISTER
            ================================================= */

            if (showRegister) {
                showRegister.addEventListener(
                    'click',
                    function () {

                        if (!modal) return;

                        modal.classList.add('register-active');

                        if (registerPanel) {
                            registerPanel.scrollTop = 0;
                        }

                        const firstField =
                            document.getElementById('registerName');

                        if (firstField) {
                            setTimeout(function () {
                                firstField.focus({ preventScroll: true });
                            }, 180);
                        }
                    }
                );
            }


            /* =================================================
               SHOW LOGIN
            ================================================= */

            if (showLogin) {
                showLogin.addEventListener(
                    'click',
                    function () {

                        if (!modal) return;

                        modal.classList.remove('register-active');

                        setLoginMethod('mobile');

                        const mobileField =
                            document.getElementById('loginMobile');

                        if (mobileField) {
                            setTimeout(function () {
                                mobileField.focus({ preventScroll: true });
                            }, 180);
                        }
                    }
                );
            }


            /* =================================================
               REGISTER TYPE
            ================================================= */

            const registerTabs =
                document.querySelectorAll(
                    '.register-tab'
                );


            registerTabs.forEach(function (tab) {

                tab.addEventListener(
                    'click',
                    function () {

                        registerTabs.forEach(
                            function (item) {

                                item.classList.remove(
                                    'active'
                                );

                            }
                        );

                        this.classList.add(
                            'active'
                        );

                    }
                );

            });


            /* =================================================
               PASSWORD SHOW / HIDE
            ================================================= */

            document
                .querySelectorAll('.eye')
                .forEach(function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            const input =
                                this
                                    .closest(
                                        '.password-wrap'
                                    )
                                    .querySelector(
                                        'input'
                                    );

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

                        }
                    );

                });


            /* =================================================
               MOBILE NUMBER VALIDATION
            ================================================= */

            const loginMobile =
                document.getElementById(
                    'loginMobile'
                );

            const registerMobile =
                document.getElementById(
                    'registerMobile'
                );


            if (loginMobile) {

                loginMobile.addEventListener(
                    'input',
                    function () {

                        this.value =
                            this.value
                                .replace(/\D/g, '')
                                .slice(0, 10);

                    }
                );

            }


            if (registerMobile) {

                registerMobile.addEventListener(
                    'input',
                    function () {

                        this.value =
                            this.value
                                .replace(/\D/g, '')
                                .slice(0, 10);

                    }
                );

            }


            /* =================================================
               LOGIN
            ================================================= */

            const loginSubmit =
                document.getElementById(
                    'loginSubmit'
                );


            if (loginSubmit) {
                loginSubmit.addEventListener(
                    'click',
                    function () {

                        const password =
                            document.getElementById(
                                'loginPassword'
                            );


                        /* Email Login */

                        if (
                            emailForm.classList.contains(
                                'active'
                            )
                        ) {

                            const email =
                                document.getElementById(
                                    'loginEmail'
                                );


                            if (
                                !email.value.trim()
                            ) {

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


                        /* Mobile Login */

                        else {

                            const mobile =
                                document.getElementById(
                                    'loginMobile'
                                );


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


                        /* Password */

                        if (
                            !password.value
                        ) {

                            showMessage(
                                'Please enter your password.'
                            );

                            password.focus();

                            return;

                        }


                        showMessage(
                            'Login details validated successfully.'
                        );

                    }
                );
            }


            /* =================================================
               REGISTER
            ================================================= */

            const registerForm =
                document.getElementById(
                    'registerForm'
                );


            if (registerForm) {
                registerForm.addEventListener(
                    'submit',
                    function (event) {

                        event.preventDefault();


                        const name =
                            document.getElementById(
                                'registerName'
                            );

                        const email =
                            document.getElementById(
                                'registerEmail'
                            );

                        const mobile =
                            document.getElementById(
                                'registerMobile'
                            );

                        const password =
                            document.getElementById(
                                'registerPassword'
                            );

                        const confirmPassword =
                            document.getElementById(
                                'confirmPassword'
                            );


                        if (!name.value.trim()) {

                            showMessage(
                                'Please enter your full name.'
                            );

                            name.focus();

                            return;

                        }


                        if (!email.value.trim()) {

                            showMessage(
                                'Please enter your email address.'
                            );

                            email.focus();

                            return;

                        }


                        if (
                            !/^[^\s@]+@[^\s@]+\.[^\s@]+$/
                                .test(
                                    email.value.trim()
                                )
                        ) {

                            showMessage(
                                'Please enter a valid email address.'
                            );

                            email.focus();

                            return;

                        }


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


                        if (
                            password.value.length < 6
                        ) {

                            showMessage(
                                'Password must be at least 6 characters.'
                            );

                            password.focus();

                            return;

                        }


                        if (
                            password.value !==
                            confirmPassword.value
                        ) {

                            showMessage(
                                'Passwords do not match.'
                            );

                            confirmPassword.focus();

                            return;

                        }


                        showMessage(
                            'Registration submitted successfully.'
                        );

                    }
                );
            }


            /* =================================================
               TOAST MESSAGE
            ================================================= */

            function showMessage(message) {

                const toast =
                    document.getElementById(
                        'toast'
                    );

                if (!toast) return;

                toast.textContent =
                    message;

                toast.classList.add(
                    'show'
                );


                clearTimeout(
                    window.toastTimer
                );


                window.toastTimer =
                    setTimeout(
                        function () {

                            toast.classList.remove(
                                'show'
                            );

                        },
                        2500
                    );

            }


            /* =================================================
               MODAL SCROLL / BODY LOCK
            ================================================= */

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

            setBodyLock(true);

            if (overlay) {
                overlay.addEventListener('click', function (event) {
                    if (event.target === overlay) {
                        window.location.href =
                            "{{ route('home') }}";
                    }
                });
            }

            /* =================================================
               ESCAPE KEY
            ================================================= */

            document.addEventListener(
                'keydown',
                function (event) {

                    if (
                        event.key === 'Escape'
                    ) {

                        if (modal) {
                            modal.classList.remove('register-active');
                        }

                    }

                }
            );

        });

    </script>

</body>

</html>