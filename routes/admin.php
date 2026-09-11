<?php

use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServicesingleController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\RentEnquiryController;
use App\Http\Controllers\Admin\RentalRequirmentsEnquiryController;
use App\Http\Controllers\Admin\ScheduleVisitEnquiryController;
use App\Http\Controllers\Admin\RentalPropertyReportController;
use App\Http\Controllers\Admin\SubscriberController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

Route::get('login', [AuthController::class, 'showLoginForm'])
    ->name('admin.login');

Route::post('login', [AuthController::class, 'login'])
    ->name('admin.loginAction');

Route::post('logout', [AuthController::class, 'logout'])
    ->name('admin.logout');

Route::get('logout', [AuthController::class, 'logout']);


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'admin'], function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('dashboard', [AuthController::class, 'dashboard'])
        ->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | Contact Enquiries
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/contact-enquiries',
        [ContactController::class, 'index']
    )->name('admin.contact.enquiries');

    Route::delete(
        '/contact-enquiries/{id}',
        [ContactController::class, 'destroy']
    )->name('admin.contact.enquiries.destroy');


    /*
    |--------------------------------------------------------------------------
    | Galleries
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | Testimonials
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | Site Settings
    |--------------------------------------------------------------------------
    */

    Route::get('/site-settings', [SiteSettingController::class, 'index'])
        ->name('site.settings.company');

    Route::get('/site-settings/edit', [SiteSettingController::class, 'edit'])
        ->name('site.settings.edit');

    Route::put('/site-settings', [SiteSettingController::class, 'update'])
        ->name('site.settings.update');


    /*
    |--------------------------------------------------------------------------
    | Rent Enquiries
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/rent-enquiries',
        [RentEnquiryController::class, 'index']
    )->name('admin.rent-enquiries.index');

    Route::delete(
        '/admin/rent-enquiries/{id}',
        [RentEnquiryController::class, 'destroy']
    )->name('admin.rent-enquiries.destroy');


    /*
    |--------------------------------------------------------------------------
    | Rental Requirements Enquiries
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/rental-requirments-enquiries',
        [RentalRequirmentsEnquiryController::class, 'index']
    )->name('admin.rental.requirments.enquiries');

    Route::delete(
        '/rental-requirments-enquiries/{id}',
        [RentalRequirmentsEnquiryController::class, 'destroy']
    )->name('admin.rental.requirments.enquiries.destroy');


    /*
    |--------------------------------------------------------------------------
    | Schedule Visit Enquiries
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/schedule-visit-enquiries',
        [ScheduleVisitEnquiryController::class, 'index']
    )->name('admin.schedule.visit.enquiries');

    Route::delete(
        '/schedule-visit-enquiries/{id}',
        [ScheduleVisitEnquiryController::class, 'destroy']
    )->name('admin.schedule.visit.enquiries.destroy');


    /*
    |--------------------------------------------------------------------------
    | Rental Property Reports
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/rental-property-reports',
        [RentalPropertyReportController::class, 'index']
    )->name('admin.rental.property.reports');

    Route::delete(
        '/rental-property-reports/{id}',
        [RentalPropertyReportController::class, 'destroy']
    )->name('admin.rental.property.reports.destroy');


    /*
    |--------------------------------------------------------------------------
    | Subscribers
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/subscribers',
        [SubscriberController::class, 'index']
    )->name('admin.subscribers');

    Route::delete(
        '/subscribers/{id}',
        [SubscriberController::class, 'destroy']
    )->name('admin.subscribers.destroy');


    /*
    |--------------------------------------------------------------------------
    | PROPERTY MANAGEMENT
    |--------------------------------------------------------------------------
    */

    // All properties
    Route::get('properties', [PropertyController::class, 'index'])
        ->name('properties.all');

    // Add property form
    Route::get('properties/create', [PropertyController::class, 'create'])
        ->name('properties.create');

    // Store admin property
    Route::post('properties', [PropertyController::class, 'store'])
        ->name('properties.store');

    // View property
    Route::get('properties/{id}', [PropertyController::class, 'show'])
        ->name('properties.show');

    // Edit property form
    Route::get('properties/{id}/edit', [PropertyController::class, 'edit'])
        ->name('properties.edit');

    // Update property
    Route::put('properties/{id}', [PropertyController::class, 'update'])
        ->name('properties.update');

    // Approve vendor property
    Route::post(
        'properties/{id}/approve',
        [PropertyController::class, 'approve']
    )->name('properties.approve');

    // Reject vendor property
    Route::post(
        'properties/{id}/reject',
        [PropertyController::class, 'reject']
    )->name('properties.reject');

    // Mark property as rented
    Route::post(
        'properties/{id}/rented',
        [PropertyController::class, 'markRented']
    )->name('properties.rented');

    // Disable property
    Route::post(
        'properties/{id}/disable',
        [PropertyController::class, 'disable']
    )->name('properties.disable');

    // Enable property
    Route::post(
        'properties/{id}/enable',
        [PropertyController::class, 'enable']
    )->name('properties.enable');

    // Delete property
    Route::delete(
        'properties/{id}',
        [PropertyController::class, 'destroy']
    )->name('properties.destroy');

    // Delete individual property image
    Route::delete(
        'properties/images/{imageId}',
        [PropertyController::class, 'destroyImage']
    )->name('properties.image.destroy');

    Route::get('amenities', [AmenityController::class, 'index'])
        ->name('admin.amenities.index');

    Route::get('amenities/create', [AmenityController::class, 'create'])
        ->name('admin.amenities.create');

    Route::post('amenities', [AmenityController::class, 'store'])
        ->name('admin.amenities.store');

    Route::get('amenities/{id}/edit', [AmenityController::class, 'edit'])
        ->name('admin.amenities.edit');

    Route::put('amenities/{id}', [AmenityController::class, 'update'])
        ->name('admin.amenities.update');

    Route::delete('amenities/{id}', [AmenityController::class, 'destroy'])
        ->name('admin.amenities.destroy');

        Route::patch('amenities/{id}/toggle-status', [AmenityController::class, 'toggleStatus'])
    ->name('admin.amenities.toggleStatus');

});


/*
|--------------------------------------------------------------------------
| Admin Forgot Password
|--------------------------------------------------------------------------
*/

Route::get(
    'forgot-password',
    [AuthController::class, 'showForgotForm']
)->name('admin.password.request');

Route::post(
    'send-otp',
    [AuthController::class, 'sendOtp']
)->name('admin.password.sendOtp');

Route::get(
    'verify-otp',
    [AuthController::class, 'showVerifyForm']
)->name('admin.password.verifyForm');

Route::post(
    'verify-otp',
    [AuthController::class, 'verifyOtp']
)->name('admin.password.verifyOtp');

Route::post(
    'reset-password-otp',
    [AuthController::class, 'resetPassword']
)->name('admin.password.resetOtp');


/*
|--------------------------------------------------------------------------
| Other Routes
|--------------------------------------------------------------------------
*/

Route::delete(
    '/contacts/{id}',
    [ContactController::class, 'destroy']
)->name('contacts.destroy');

Route::get(
    '/service',
    [ServiceController::class, 'index']
)->name('service.all');

Route::delete(
    '/service/{id}',
    [ServiceController::class, 'destroy']
)->name('service.destroy');


/*
|--------------------------------------------------------------------------
| Service Single
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'admin'], function () {

    Route::prefix('servicesingle')
        ->name('admin.servicesingle.')
        ->group(function () {

            Route::get(
                '/',
                [ServicesingleController::class, 'index']
            )->name('all');

            Route::post(
                '/store',
                [ServicesingleController::class, 'store']
            )->name('store');

            Route::get(
                '/{id}/edit',
                [ServicesingleController::class, 'edit']
            )->name('edit');

            Route::put(
                '/{id}',
                [ServicesingleController::class, 'update']
            )->name('update');

            Route::delete(
                '/{id}',
                [ServicesingleController::class, 'destroy']
            )->name('destroy');

        });

});