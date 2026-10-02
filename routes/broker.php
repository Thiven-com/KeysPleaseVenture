<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Broker\AuthController;
use App\Http\Controllers\Broker\BrokerController;


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

        Route::get('/properties', [BrokerController::class, 'properties'])
            ->name('properties');

        Route::get('/properties/create', [BrokerController::class, 'createProperty'])
            ->name('properties.create');
        Route::post('/properties', [BrokerController::class, 'storeProperty'])
            ->name('properties.store');
        Route::get('/properties/{id}/edit', [BrokerController::class, 'editProperty'])
            ->name('properties.edit');
        Route::put('/properties/{id}', [BrokerController::class, 'updateProperty'])
            ->name('properties.update');

        Route::get('/enquiries', [BrokerController::class, 'enquiries'])
            ->name('enquiries');

        Route::get('/schedule', [BrokerController::class, 'schedule'])
            ->name('schedule');

        Route::get('/profile', [BrokerController::class, 'profile'])
            ->name('profile');

        Route::get('/settings', [BrokerController::class, 'settings'])
            ->name('settings');

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