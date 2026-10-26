<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Customer Login - Email and Password
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()
                ->route('home')
                ->with('success', 'Login successful.');
        }

        return back()
            ->withErrors([
                'email' => 'Invalid email or password.',
            ])
            ->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | Send OTP - Database
    |--------------------------------------------------------------------------
    */


/**
 * Send 4-digit OTP
 */
public function sendOtp(Request $request)
{
    $request->validate([
        'country_code' => ['required', 'string', 'max:5'],
        'mobile' => ['required', 'digits:10'],
    ]);

    // Combine country code and mobile number
    $mobile = $request->country_code . $request->mobile;

    // Find customer
    $customer = Customer::where('mobile', $mobile)->first();

    // Create customer if not exists
    if (!$customer) {
        $customer = Customer::create([
            'name' => 'Customer',
            'mobile' => $mobile,
            'password' => Hash::make(
                bin2hex(random_bytes(16))
            ),
        ]);
    }

    // Generate 4-digit OTP
    $otp = (string) random_int(1000, 9999);

    // Save OTP
    $customer->otp = $otp;

    // OTP expires after 5 minutes
    $customer->otp_expires_at = now()->addMinutes(5);

    // Reset attempts
    $customer->otp_attempts = 0;

    $customer->save();

    // Return OTP login session
    return back()->with([
        'otp_sent' => true,
        'otp_mobile' => $request->mobile,
        'otp_country_code' => $request->country_code,
        'dev_otp' => $otp,
        'success' => '4-digit OTP generated successfully.',
    ]);
}


/**
 * Verify 4-digit OTP
 */
public function verifyOtp(Request $request)
{
    $request->validate([
        'mobile' => ['required', 'digits:10'],
        'country_code' => ['required', 'string', 'max:5'],
        'otp' => ['required', 'digits:4'],
    ]);

    // Combine country code and mobile number
    $mobile = $request->country_code . $request->mobile;

    // Find customer
    $customer = Customer::where('mobile', $mobile)->first();

    if (!$customer) {
        return back()->withErrors([
            'otp' => 'Customer not found.',
        ]);
    }

    // Check attempts
    if ($customer->otp_attempts >= 5) {
        return back()->withErrors([
            'otp' => 'Maximum OTP attempts reached. Please request a new OTP.',
        ]);
    }

    // Check expiration
    if (
        !$customer->otp_expires_at ||
        $customer->otp_expires_at->isPast()
    ) {
        return back()->withErrors([
            'otp' => 'OTP expired. Please request a new OTP.',
        ]);
    }

    // Increment attempts
    $customer->otp_attempts++;
    $customer->save();

    // Verify OTP
    if ($customer->otp !== $request->otp) {
        return back()->withErrors([
            'otp' => 'Invalid OTP. Please try again.',
        ]);
    }

    // Clear OTP after successful verification
    $customer->otp = null;
    $customer->otp_expires_at = null;
    $customer->otp_attempts = 0;

    $customer->save();

    // Login customer
    Auth::guard('customer')->login($customer);

    // Regenerate session
    $request->session()->regenerate();

    return redirect()
        ->route('home')
        ->with('success', 'Login successful.');
}



    /*
    |--------------------------------------------------------------------------
    | Customer Logout
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'Logged out successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Customer Registration
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:customers,email',
            ],

            'mobile' => [
                'nullable',
                'string',
                'max:20',
                'unique:customers,mobile',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        $request->session()->regenerate();

        return redirect()
            ->route('home')
            ->with('success', 'Registration successful.');
    }
}
