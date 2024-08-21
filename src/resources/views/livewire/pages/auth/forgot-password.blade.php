<?php

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state(['email' => '']);

rules(['email' => ['required', 'string', 'email']]);

$sendPasswordResetLink = function () {
    $this->validate();

    // We will send the password reset link to this user. Once we have attempted
    // to send the link, we will examine the response then see the message we
    // need to show to the user. Finally, we'll send out a proper response.
    $status = Password::sendResetLink(
        $this->only('email')
    );

    if ($status != Password::RESET_LINK_SENT) {
        $this->addError('email', __($status));

        return;
    }

    $this->reset('email');

    Session::flash('status', __($status));
};

?>

<div class="min-vw-100">
    <main class="form-signin w-100 m-auto">
        <div class="card border-light-subtle">
            <div class="card-body">
                <p class="text-center text-secondary-emphasis fs-4 m-0 p-0">{{ __('Forgot Your Password?') }}</p>
                <p class="text-center text-secondary">
                    {{ __('No problem. Just let us know your email address and we will email you a password reset link that
                    will allow you to choose a new one.') }}
                </p>
                <form wire:submit="sendPasswordResetLink">
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control shadow-none rounded-0" wire:model="email" name="email" id="email" placeholder="{{ __('Email') }}" required autofocus autocomplete="off">
                        <label for="email">{{ __('Email') }}</label>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">{{ __('Email Password Reset Link')
                            }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row row-cols-1 mt-2">
            <div class="col text-center text-md-end fs-md"> {{ __('Back to') }} <a
                    href="{{ route('login') }}">{{ __('Sign In') }}</a></div>
        </div>
    </main>
</div>

{{-- <div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}
