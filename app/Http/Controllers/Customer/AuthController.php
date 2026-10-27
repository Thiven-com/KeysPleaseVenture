<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Customer;
use App\Models\RentalRequirmentsEnquiry;
use App\Models\ScheduleVisitEnquiry;

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
        // $otp = (string) random_int(1000, 9999);
        // Default OTP for development only
        $otp = '1234';

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


    /**
     * Customer Account Dashboard
     */
    /**
 * Customer Account Dashboard
 */

public function account()
{
    $customer = Auth::guard('customer')->user();

    // Latest 5 property enquiries
    $recentEnquiries = \App\Models\RentalRequirmentsEnquiry::where(
        'customer_id',
        $customer->id
    )
        ->latest()
        ->take(5)
        ->get();

    // Latest 3 site visits
    $recentSiteVisits = \App\Models\ScheduleVisitEnquiry::where(
        'customer_id',
        $customer->id
    )
        ->orderByDesc('visit_date')
        ->orderByDesc('visit_time')
        ->take(3)
        ->get();

    return view('website.account.index', compact(
        'customer',
        'recentEnquiries',
        'recentSiteVisits'
    ));
}


    /**
     * Edit Customer Profile
     */
    public function editProfile()
    {
        $customer = Auth::guard('customer')->user();

        return view('website.account.edit-profile', compact('customer'));
    }

    /**
     * Update Customer Profile
     */
    public function updateProfile(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],

            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('customers', 'email')->ignore($customer->id),
            ],
        ], [
            'name.required' => 'Please enter your full name.',
            'name.max' => 'Your name cannot exceed 100 characters.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
        ]);

        $customer->name = $validated['name'];
        $customer->email = $validated['email'] ?? null;

        $customer->save();

        return redirect()
            ->route('customer.account')
            ->with('success', 'Your profile has been updated successfully.');
    }


    public function myEnquiries()
    {
        $customer = Auth::guard('customer')->user();

        $enquiries = RentalRequirmentsEnquiry::where('customer_id', $customer->id)
            ->latest()
            ->paginate(10);

        return view('website.account.my-enquiries', compact(
            'customer',
            'enquiries'
        ));
    }

    
/**
 * Customer Site Visits
 */
public function mySiteVisits()
{
    $customer = Auth::guard('customer')->user();

    $siteVisits = ScheduleVisitEnquiry::where(
        'customer_id',
        $customer->id
    )
        ->orderByDesc('visit_date')
        ->orderByDesc('visit_time')
        ->paginate(10);

    return view('website.account.site-visits', compact(
        'customer',
        'siteVisits'
    ));
}

}
