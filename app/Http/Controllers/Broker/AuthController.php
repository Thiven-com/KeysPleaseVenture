<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login Page
    public function showLoginForm()
    {
        return view('broker.auth.login');
    }


    // Registration Page
    public function showRegisterForm()
    {
        return view('broker.auth.register');
    }


    // Broker Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:brokers,email',
            'mobile' => 'required|string|max:20',
            'broker_type' => 'required|string|max:100',
            'agency_name' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Broker::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'broker_type' => $request->broker_type,
            'agency_name' => $request->agency_name,
            'license_number' => $request->license_number,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'password' => Hash::make($request->password),

            // New registrations require admin approval
            'status' => 'pending',

            // Clear rejection reason for new registration
            'rejection_reason' => null,
        ]);

        return redirect()
            ->route('broker.login')
            ->with(
                'success',
                'Registration submitted successfully. Please wait for admin approval.'
            );
    }


    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Find Broker
        |--------------------------------------------------------------------------
        */

        $broker = Broker::where('email', $request->email)->first();

        if (!$broker) {
            return back()
                ->withErrors([
                    'email' => 'Invalid credentials.',
                ])
                ->withInput($request->only('email'));
        }


        /*
        |--------------------------------------------------------------------------
        | Check Password
        |--------------------------------------------------------------------------
        */

        if (!Hash::check($request->password, $broker->password)) {
            return back()
                ->withErrors([
                    'email' => 'Invalid credentials.',
                ])
                ->withInput($request->only('email'));
        }


        /*
        |--------------------------------------------------------------------------
        | Pending Broker
        |--------------------------------------------------------------------------
        */

        if ($broker->status === 'pending') {
            return back()
                ->withErrors([
                    'email' => 'Your account is waiting for admin approval.',
                ])
                ->withInput($request->only('email'));
        }


        /*
        |--------------------------------------------------------------------------
        | Rejected Broker
        |--------------------------------------------------------------------------
        */

        if ($broker->status === 'rejected') {

            $message = 'Your broker registration has been rejected.';

            if (!empty($broker->rejection_reason)) {
                $message .= ' Reason: ' . $broker->rejection_reason;
            }

            return back()
                ->withErrors([
                    'email' => $message,
                ])
                ->withInput($request->only('email'));
        }


        /*
        |--------------------------------------------------------------------------
        | Inactive Broker
        |--------------------------------------------------------------------------
        */

        if ($broker->status === 'inactive') {
            return back()
                ->withErrors([
                    'email' => 'Your broker account is currently inactive. Please contact the administrator.',
                ])
                ->withInput($request->only('email'));
        }


        /*
        |--------------------------------------------------------------------------
        | Only Approved Brokers Can Login
        |--------------------------------------------------------------------------
        */

        if ($broker->status !== 'approved') {
            return back()
                ->withErrors([
                    'email' => 'Your account is not active. Please contact the administrator.',
                ])
                ->withInput($request->only('email'));
        }


        /*
        |--------------------------------------------------------------------------
        | Login Approved Broker
        |--------------------------------------------------------------------------
        */

        Auth::guard('broker')->login($broker);

        $request->session()->regenerate();

        return redirect()->route('broker.dashboard');
    }


    // Dashboard
    public function dashboard()
    {
        return view('broker.auth.dashboard');
    }


    // Logout
    public function logout(Request $request)
    {
        Auth::guard('broker')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('broker.login');
    }


    // Forgot Password Page
    public function showForgotForm()
    {
        return view('broker.auth.forgot-password');
    }


    // Send OTP
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $broker = Broker::where('email', $request->email)->first();

        if (!$broker) {
            return back()
                ->withErrors([
                    'email' => 'Broker email not found.',
                ])
                ->withInput();
        }


        // Generate 6-digit OTP
        $otp = random_int(100000, 999999);

        try {

            // Save OTP
            $broker->otp = $otp;
            $broker->save();


            // Save broker email in session
            session([
                'broker_email' => $broker->email,
                'broker_otp_verified' => false,
            ]);


            // Send OTP email
            Mail::raw(
                "Hello {$broker->name},\n\n"
                . "Your broker password reset OTP is: {$otp}\n\n"
                . "Please use this OTP to reset your password.\n\n"
                . "Thank you.",

                function ($message) use ($broker) {

                    $message
                        ->to($broker->email)
                        ->subject('Broker Password Reset OTP');

                }
            );


            return redirect()
                ->route('broker.password.verifyForm')
                ->with(
                    'success',
                    'OTP sent successfully to your email.'
                );

        } catch (\Throwable $e) {

            Log::error('Broker OTP Email Error', [
                'email' => $broker->email,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return back()
                ->withErrors([
                    'email' => 'Unable to send OTP. Please check mail configuration.',
                ])
                ->withInput();
        }
    }


    // Verify OTP Page
    public function showVerifyForm()
    {
        if (!session('broker_email')) {
            return redirect()
                ->route('broker.password.request');
        }

        return view('broker.auth.verify-otp');
    }


    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        $broker = Broker::where('email', $request->email)->first();

        if (!$broker || !$broker->otp) {
            return back()
                ->withErrors([
                    'otp' => 'Invalid OTP.',
                ]);
        }


        if ((string) $request->otp !== (string) $broker->otp) {
            return back()
                ->withErrors([
                    'otp' => 'Invalid OTP.',
                ]);
        }


        // OTP verification successful
        session([
            'broker_email' => $broker->email,
            'broker_otp_verified' => true,
        ]);


        return view('broker.auth.reset-password', [
            'email' => $broker->email,
        ]);
    }


    // Reset Password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $broker = Broker::where('email', $request->email)->first();

        if (!$broker) {
            return back()
                ->withErrors([
                    'email' => 'Broker not found.',
                ]);
        }


        if (!session('broker_otp_verified')) {
            return redirect()
                ->route('broker.password.request')
                ->withErrors([
                    'email' => 'Please verify OTP first.',
                ]);
        }


        // Update password
        $broker->password = Hash::make($request->password);


        // Clear OTP
        $broker->otp = null;

        $broker->save();


        // Clear reset session
        session()->forget([
            'broker_email',
            'broker_otp_verified',
        ]);


        return redirect()
            ->route('broker.login')
            ->with(
                'success',
                'Password reset successfully.'
            );
    }
}