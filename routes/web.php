<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RentEnquiryController;
use App\Http\Controllers\RentalRequirmentsEnquiryController;
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
// LIST YOUR PROPERTY
// ========================================

Route::post(
    '/properties/store',
    [PropertyController::class, 'store']
)->name('properties.store');


Route::post(
    '/rental-requirments-enquiry',
    [RentalRequirmentsEnquiryController::class, 'store']
)->name('rental.requirments.enquiry.store');

Route::post('/rent-enquiry', [RentEnquiryController::class, 'store'])
    ->name('rent.enquiry.store');

