<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // Login Page
    public function showLoginForm()
    {
        return view('broker.auth.login');
    }

    // Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('broker')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('broker.dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Invalid Credentials',
            ])
            ->withInput($request->only('email'));
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

            // Send plain text email without a Blade email template
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
                ->with('success', 'OTP sent successfully to your email.');

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
            return redirect()->route('broker.password.request');
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
            return back()->withErrors([
                'otp' => 'Invalid OTP.',
            ]);
        }

        if ((string) $request->otp !== (string) $broker->otp) {
            return back()->withErrors([
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
            return back()->withErrors([
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
        $broker->password = bcrypt($request->password);

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
            ->with('success', 'Password reset successfully.');
    }
}