<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route::view('/', 'welcome');

Route::middleware(['auth', 'verified', 'must_create_password'])->group(function () {
    // Dashboard page
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Profile page
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__ . '/auth.php';
