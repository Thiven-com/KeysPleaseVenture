<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RentEnquiryController;
use App\Http\Controllers\RentalRequirmentsEnquiryController;
use App\Http\Controllers\ScheduleVisitEnquiryController;
use App\Http\Controllers\RentalPropertyReportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'home'])
    ->name('home');

Route::get('about', [PageController::class, 'about'])
    ->name('about');

Route::get('contact', [PageController::class, 'contact'])
    ->name('contact');

Route::get('rent', [PageController::class, 'rent'])
    ->name('rent');

Route::get('propertydetails', [PageController::class, 'propertydetails'])
    ->name('propertydetails');

Route::get('login', [PageController::class, 'login'])
    ->name('login');


// ========================================
// LIST YOUR PROPERTY - VENDOR
// ========================================

Route::post(
    '/properties/store',
    [PropertyController::class, 'store']
)->name('vendor.properties.store');


// ========================================
// RENT ENQUIRY
// ========================================

Route::post(
    '/rent-enquiry',
    [RentEnquiryController::class, 'store']
)->name('rent.enquiry.store');


// ========================================
// RENTAL REQUIREMENTS ENQUIRY
// ========================================

Route::post(
    '/rental-requirments-enquiry',
    [RentalRequirmentsEnquiryController::class, 'store']
)->name('rental.requirments.enquiry.store');


// ========================================
// SCHEDULE VISIT
// ========================================

Route::post(
    '/schedule-visit-enquiry',
    [ScheduleVisitEnquiryController::class, 'store']
)->name('schedule.visit.enquiry.store');


// ========================================
// PROPERTY REPORT
// ========================================

Route::post(
    '/rental-property-report',
    [RentalPropertyReportController::class, 'store']
)->name('rental.property.report.store');


// ========================================
// CONTACT
// ========================================

Route::post(
    '/contact',
    [ContactController::class, 'store']
)->name('contact.store');


// ========================================
// SUBSCRIBE
// ========================================

Route::post(
    '/subscribe',
    [SubscribeController::class, 'store']
)->name('subscribe.store');



Route::get('/php-upload-info', function () {
    return [
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'post_max_size' => ini_get('post_max_size'),
        'memory_limit' => ini_get('memory_limit'),
    ];
});