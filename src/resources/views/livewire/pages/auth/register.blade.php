<?php

use function Livewire\Volt\{ layout, title };

layout('layouts.guest');

title('Sign Up');

$signUpWithGoogle = function () {
    return redirect()->route('oauth.redirect', ['provider' => 'google', 'frompage' => 'signup']);
}

?>

<div>
    <section class="d-flex align-items-center justify-content-center vh-100 overflow-hidden">
        <div class="form-signup w-100 m-auto">
            <div class="card border-light-subtle">
                <div class="card-body">
                    <p class="text-center text-secondary-emphasis fs-4 m-0 p-0">{{ __('Let\'s start!') }}</p>
                    <p class="text-center text-secondary">
                        {{-- {{ __('Easily track spending, set budgets, and generate reports to take control of your finances.')
                        }} --}}
                        {{ __('Start your journey to financial freedom by tracking spending and setting budgets.') }}
                    </p>

                    <div class="mb-4">
                        <button
                            class="btn btn-light btn-with-icon border w-100 py-3 fw-medium"
                            wire:click="signUpWithGoogle"
                            wire:loading.class.remove="btn-with-icon"
                            wire:loading.attr="disabled">
                            <span class="icon" wire:loading.remove wire:target="signUpWithGoogle">
                                <img src="{{ asset('images/icon/google.png') }}" alt="Google Icon">
                            </span>
                            <span class="text" wire:loading.remove wire:target="signUpWithGoogle">{{ __('Sign Up with Google') }}</span>

                            <span class="spinner-border spinner-border-sm text-secondary" aria-hidden="true" wire:loading
                                wire:target="signUpWithGoogle">
                            </span>
                        </button>
                    </div>

                    <div class="line-divider mb-2">OR</div>

                    <div class="mb-4">
                        <a href="{{ route('login') }}" class="btn btn-link w-100 fw-bolder">{{ __('Sign In') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
