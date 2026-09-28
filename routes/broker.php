<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Broker\AuthController;


/*
|--------------------------------------------------------------------------
| Broker Authentication Routes
|--------------------------------------------------------------------------
*/

Route::name('broker.')->group(function () {

    // ==========================================
    // Broker Registration
    // ==========================================

    Route::get('/register', [AuthController::class, 'showRegisterForm'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.submit');


    // ==========================================
    // Broker Login
    // ==========================================

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');


    // ==========================================
    // Broker Logout
    // ==========================================

    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    // ==========================================
    // Protected Broker Routes
    // ==========================================

    Route::middleware('auth:broker')->group(function () {

        // Dashboard
        Route::get('/dashboard', [AuthController::class, 'dashboard'])
            ->name('dashboard');

    });

});


/*
|--------------------------------------------------------------------------
| Broker Forgot Password
|--------------------------------------------------------------------------
*/

// Forgot Password
Route::get(
    '/forgot-password',
    [AuthController::class, 'showForgotForm']
)->name('broker.password.request');


// Send OTP
Route::post(
    '/send-otp',
    [AuthController::class, 'sendOtp']
)->name('broker.password.sendOtp');


// Show Verify OTP Form
Route::get(
    '/verify-otp',
    [AuthController::class, 'showVerifyForm']
)->name('broker.password.verifyForm');


// Verify OTP
Route::post(
    '/verify-otp',
    [AuthController::class, 'verifyOtp']
)->name('broker.password.verifyOtp');


// Reset Password
Route::post(
    '/broker/reset-password-otp',
    [AuthController::class, 'resetPassword']
)->name('broker.password.resetOtp');