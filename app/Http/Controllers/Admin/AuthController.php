<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminPasswordResetOtpMail;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Validator;
use Alert;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\ServiceEnquiry;
use App\Models\Services;
use App\Models\Servicesingle;
use App\Models\Testimonial;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['Invalid Credentials']);
    }

    // public function dashboard()
    // {
    //     return view('admin.auth.dashboard'); // create this Blade view
    // }
    public function dashboard()
    {
        
        //  $contactCount = Contact::count();
        return view('admin.auth.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function showForgotForm()
    {
        return view('admin.auth.forgot-password');
    }
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email'
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!isset($admin->id)) {
            return back()->withErrors(['email' => 'Invalid Email']);
        }
        // $otp = 123456;
        $otp = rand(100000, 999999);

        $admin->otp = $otp;
        $admin->save();

        try {
            Mail::to($request->email)->send(new AdminPasswordResetOtpMail($otp));
        } catch (\Exception $e) {
        }
        session(['email' => $request->email]);
        return redirect()->route('admin.password.verifyForm')
            ->with('email', $request->email)
            ->with('success', 'OTP sent to your email.');
    }
    public function showVerifyForm()
    {
        if (!session('email')) {

            return redirect()->route('admin.password.request');
        }

        return view('admin.auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !$admin->otp) {
            session(['email' => $request->email]);

            return redirect(route('admin.password.verifyForm'))->withErrors(['otp' => 'Invalid OTP']);
        }

        if ($request->otp != $admin->otp) {
            session(['email' => $request->email]);

            return redirect(route('admin.password.verifyForm'))->withErrors(['otp' => 'Invalid OTP']);
        }

        return view('admin.auth.reset-password', [
            'email' => $request->email
        ]);
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);


        $admin = Admin::where('email', $request->email)->first();

        $admin->password = bcrypt($request->password);
        $admin->otp = null;
        $admin->save();
        session()->forget('email');

        return redirect()->route('admin.login')
            ->with('success', 'Password reset successfully.');
    }


}
