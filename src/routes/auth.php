<?php

use App\Http\Controllers\Auth\OauthController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('signup', 'pages.auth.register')
        ->name('register');

    Volt::route('signin', 'pages.auth.login')
        ->name('login');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');


    Route::prefix('oauth')->group(function () {
        Route::get('{provider}/redirect/{frompage}', [OauthController::class, 'redirectHandler'])
            ->whereIn('provider', ['google'])
            ->whereIn('frompage', ['signin', 'signup'])
            ->name('oauth.redirect');

        Route::get('{provider}/callback', [OauthController::class, 'callbackHanlder'])
            ->whereIn('provider', ['google'])
            ->name('oauth.callback');
    });
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});
