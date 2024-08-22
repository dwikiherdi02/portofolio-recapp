<?php

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\{ layout, title, state, rules };

layout('layouts.guest');

title('Forgot Password');

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

<div>
    <section class="d-flex align-items-center justify-content-center vh-100 overflow-hidden">
        <div class="form-signin w-100 m-auto">
            <div class="card border-light-subtle">
                <div class="card-body">
                    <p class="text-center text-secondary-emphasis fs-4 m-0 p-0">{{ __('Forgot Your Password?') }}</p>
                    <p class="text-center text-secondary">
                        {{ __('No problem. Just let us know your email address and we will email you a password reset link that
                        will allow you to choose a new one.') }}
                    </p>
                    <form wire:submit="sendPasswordResetLink">
                        {{-- <div class="form-floating mb-4">
                            <input type="email" class="form-control shadow-none rounded-0" wire:model="email" name="email" id="email" placeholder="{{ __('Email') }}" required autofocus autocomplete="off">
                            <label for="email">{{ __('Email') }}</label>
                        </div> --}}

                        <div class="input-group has-validation mb-4">
                            <div class="form-floating {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <input type="email" name="email" id="email"
                                    class="form-control shadow-none rounded-0 {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    placeholder="{{ __('Email') }}" wire:model="email">
                                <label for="email">{{ __('Email') }}</label>
                            </div>
                            <div class="invalid-feedback">
                                {{ collect($errors->get('email'))->first() }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <button
                                type="submit"
                                class="btn btn-primary w-100 py-3 fw-bold"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove> {{ __('Email Password Reset Link') }} </span>

                                <span class="spinner-border spinner-border-sm text-light" aria-hidden="true" wire:loading>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 mt-2">
                <div class="col text-center text-md-end fs-md"> {{ __('Back to') }} <a
                        href="{{ route('login') }}">{{ __('Sign In') }}</a></div>
            </div>
        </div>
    </section>
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
