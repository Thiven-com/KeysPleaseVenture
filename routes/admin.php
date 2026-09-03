<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServicesingleController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\RentEnquiryController;
use Illuminate\Support\Facades\Route;





Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [AuthController::class, 'login'])->name('admin.loginAction');

Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('contacts', [ContactController::class, 'index'])
        ->name('contacts.all');

    Route::delete('contacts/{id}', [ContactController::class, 'destroy'])
        ->name('contacts.delete');

    Route::get('galleries', [GalleryController::class, 'index'])
        ->name('galleries.all');

    Route::get('galleries/create', [GalleryController::class, 'create'])
        ->name('galleries.create');

    Route::post('galleries', [GalleryController::class, 'store'])
        ->name('galleries.store');

    Route::get('galleries/{id}/edit', [GalleryController::class, 'edit'])
        ->name('galleries.edit');

    Route::put('galleries/{id}', [GalleryController::class, 'update'])
        ->name('galleries.update');

    Route::delete('galleries/{id}', [GalleryController::class, 'destroy'])
        ->name('galleries.destroy');


    Route::get('/testimonials', [TestimonialController::class, 'index'])
        ->name('testimonials.all');

    Route::get('/testimonials/create', [TestimonialController::class, 'create'])
        ->name('testimonials.create');

    Route::post('/testimonials', [TestimonialController::class, 'store'])
        ->name('testimonials.store');

    Route::get('/testimonials/{id}/edit', [TestimonialController::class, 'edit'])
        ->name('testimonials.edit');

    Route::put('/testimonials/{id}', [TestimonialController::class, 'update'])
        ->name('testimonials.update');

    Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy'])
        ->name('testimonials.destroy');

    Route::get('/site-settings', [SiteSettingController::class, 'index'])
        ->name('site.settings.company');

    Route::get('/site-settings/edit', [SiteSettingController::class, 'edit'])
        ->name('site.settings.edit');

    Route::put('/site-settings', [SiteSettingController::class, 'update'])
        ->name('site.settings.update');


Route::get(
    '/admin/rent-enquiries',
    [RentEnquiryController::class, 'index']
)->name('admin.rent-enquiries.index');

Route::delete(
    '/admin/rent-enquiries/{id}',
    [RentEnquiryController::class, 'destroy']
)->name('admin.rent-enquiries.destroy');

    // Property Management
    Route::get('properties', [PropertyController::class, 'index'])
        ->name('properties.all');

    Route::get('properties/{id}', [PropertyController::class, 'show'])
        ->name('properties.show');

    Route::post('properties/{id}/approve', [PropertyController::class, 'approve'])
        ->name('properties.approve');

    Route::post('properties/{id}/reject', [PropertyController::class, 'reject'])
        ->name('properties.reject');

    Route::post('properties/{id}/rented', [PropertyController::class, 'markRented'])
        ->name('properties.rented');

    Route::post('properties/{id}/disable', [PropertyController::class, 'disable'])
        ->name('properties.disable');

    Route::post('properties/{id}/enable', [PropertyController::class, 'enable'])
        ->name('properties.enable');

});

Route::get('forgot-password', [AuthController::class, 'showForgotForm'])
    ->name('admin.password.request');

Route::post('send-otp', [AuthController::class, 'sendOtp'])
    ->name('admin.password.sendOtp');

Route::get('verify-otp', [AuthController::class, 'showVerifyForm'])
    ->name('admin.password.verifyForm');

Route::post('verify-otp', [AuthController::class, 'verifyOtp'])
    ->name('admin.password.verifyOtp');

Route::post('reset-password-otp', [AuthController::class, 'resetPassword'])
    ->name('admin.password.resetOtp');


// Route::post('/contact-store', [ContactController::class, 'store'])
//     ->name('contact.store');

Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])
    ->name('contacts.destroy');

Route::get('/service', [ServiceController::class, 'index'])->name('service.all');

Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

Route::group(['middleware' => 'admin'], function () {

    Route::prefix('servicesingle')->name('admin.servicesingle.')->group(function () {

        Route::get('/', [ServicesingleController::class, 'index'])->name('all');

        Route::post('/store', [ServicesingleController::class, 'store'])->name('store');

        // Route::get('/{id}', [ServicesingleController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ServicesingleController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ServicesingleController::class, 'update'])->name('update');

        Route::delete('/{id}', [ServicesingleController::class, 'destroy'])->name('destroy');

    });

});


