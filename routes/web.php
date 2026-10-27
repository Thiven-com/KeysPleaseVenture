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
use App\Http\Controllers\Customer\AuthController;

use App\Http\Controllers\Customer\AuthController as CustomerAuthController;


Route::get('/', [PageController::class, 'home'])
    ->name('home');

Route::get('about', [PageController::class, 'about'])
    ->name('about');

Route::get('contact', [PageController::class, 'contact'])
    ->name('contact');

    
Route::get('subscription', [PageController::class, 'subscription'])
    ->middleware('auth:customer')
    ->name('subscription.index');

 // CUSTOMER ACCOUNT
Route::get('/my-account', [CustomerAuthController::class, 'account'])
    ->middleware('auth:customer')
    ->name('customer.account');

// CUSTOMER EDIT PROFILE
Route::middleware('auth:customer')->group(function () {

    Route::get('/my-account/edit', [
        CustomerAuthController::class,
        'editProfile'
    ])->name('customer.profile.edit');

    Route::put('/my-account/update', [
        CustomerAuthController::class,
        'updateProfile'
    ])->name('customer.profile.update');

   Route::get('/my-account/enquiries', [
    CustomerAuthController::class,
    'myEnquiries'
])->name('customer.enquiries');


Route::get('/my-account/site-visits', [
    CustomerAuthController::class,
    'mySiteVisits'
])->name('customer.site-visits');


});




 // ========================================
 // RENT PROPERTIES
 // ========================================

Route::get('/rent', [PageController::class, 'rent'])
    ->name('rent');


// ========================================
// SELL PROPERTIES
// ========================================

Route::get('/sell', [PageController::class, 'sell'])
    ->name('sell');


// ========================================
// RENT PROPERTIES BY CITY
// ========================================

Route::get('/rent/{citySlug}', [PageController::class, 'rentByCity'])
    ->name('rent.city');


Route::get('/sell/{citySlug}', [PageController::class, 'sellByCity'])
    ->name('sell.city');


    

Route::get('propertydetails/{slug}', [PageController::class, 'propertydetails'])
    ->name('propertydetails');

Route::get('login', [PageController::class, 'login'])
    ->name('login');

    // ========================================
// USER LOGIN
// ========================================


 // ========================================
 // CUSTOMER LOGIN
 // ========================================

// CUSTOMER LOGIN

Route::post('/login', [CustomerAuthController::class, 'login'])
    ->name('login.submit');

// CUSTOMER LOGOUT

Route::post('/logout', [CustomerAuthController::class, 'logout'])
    ->middleware('auth:customer')
    ->name('customer.logout');

    Route::post('/register', [CustomerAuthController::class, 'register'])
    ->name('customer.register');

   Route::post('/customer/send-otp', [
    CustomerAuthController::class,
    'sendOtp'
])->name('customer.otp.send');

Route::post('/customer/verify-otp', [
    CustomerAuthController::class,
    'verifyOtp'
])->name('customer.otp.verify');



    

Route::get('/how-it-works', [PageController::class, 'howItWorks'])
    ->name('website.how-it-works');


    Route::get('/faqs', [PageController::class, 'faqs'])
    ->name('website.faqs');

    
Route::get('/rental-guide', [PageController::class, 'rentalGuide'])
    ->name('website.rental-guide');



Route::get('/safety-tips', [PageController::class, 'safetyTips'])
    ->name('website.safety-tips');

    
Route::get('/enquiry-support', [PageController::class, 'enquirySupport'])
    ->name('website.enquiry-support');

    
Route::get('/broker-benefits', [PageController::class, 'brokerBenefits'])
    ->name('website.broker-benefits');

    
Route::get('/partner-with-us', [PageController::class, 'partnerWithUs'])
    ->name('website.partner-with-us');

    
Route::get('/terms-and-conditions', [PageController::class, 'termsAndConditions'])
    ->name('website.terms-and-conditions');

    
Route::get('/resources', [PageController::class, 'resources'])
    ->name('website.resources');

    
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])
    ->name('website.privacy-policy');








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