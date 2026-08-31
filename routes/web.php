<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('rent', [PageController::class, 'rent'])->name('rent');
Route::get('propertydetails', [PageController::class, 'propertydetails'])->name('propertydetails');





Route::get('login', [PageController::class, 'login'])->name('login');
