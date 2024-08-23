<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\{mount, layout, title, state, form};

layout('layouts.default');

title('Sign In');

state(['errorMessage']);

form(LoginForm::class);

mount(function () {
    $this->errorMessage = session()->get('error_message') ?? '';
});

$login = function () {
    $this->errorMessage = '';

    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
};

$signInWithGoogle = function () {
    $this->errorMessage = '';

    return redirect()->route('oauth.redirect', ['provider' => 'google', 'frompage' => 'signin']);
}

?>

<div>
    <section class="d-flex align-items-center justify-content-center vh-100 overflow-hidden">
        <div class="form-signin w-100 m-auto">
            <div class="card border-light-subtle">
                <div class="card-body">
                    <p class="text-center text-secondary-emphasis fs-4 m-0 p-0">{{ __('Welcome.') }}</p>
                    <p class="text-center text-secondary">
                        {{ __('Please enter your credentials to sign in') }}
                    </p>
                    @if ($errorMessage != "")
                        <div class="alert alert-danger" role="alert" wire:loading.remove wire:target="login, signInWithGoogle">
                            {{ $errorMessage }}
                        </div>
                    @endif
                    <form wire:submit="login">
                        <div class="input-group has-validation mb-4">
                            <div class="form-floating {{ $errors->has('form.email') ? 'is-invalid' : '' }}">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control shadow-none rounded-0 {{ $errors->has('form.email') ? 'is-invalid' : '' }}"
                                    placeholder="{{ __('Email') }}"
                                    wire:model="form.email">
                                <label for="email">{{ __('Email') }}</label>
                            </div>
                            <div class="invalid-feedback">
                                {{ collect($errors->get('form.email'))->first() }}
                            </div>
                        </div>

                        <div class="input-group has-validation">
                            <div class="form-floating {{ $errors->has('form.password') ? 'is-invalid' : '' }}">
                                <input type="password"
                                    class="form-control shadow-none rounded-0 {{ $errors->has('form.password') ? 'is-invalid' : '' }}"
                                    wire:model="form.password" name="password" id="password" placeholder="{{ __('Password') }}">
                                <label for="password">{{ __('Password') }}</label>
                            </div>
                            <div class="invalid-feedback">
                                {{ collect($errors->get('form.password'))->first() }}
                            </div>
                        </div>
                        <div class="mb-4 mt-1 float-end">
                            <a href="{{ route('password.request') }}" class="fs-md">Forgot password?</a>
                        </div>

                        <div class="mb-4">
                            <button
                                type="submit"
                                class="btn btn-primary w-100 py-3 fw-bold"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove wire:target="login">{{ __('Sign In') }}</span>

                                <span
                                    class="spinner-border spinner-border-sm text-light" aria-hidden="true"
                                    wire:loading
                                    wire:target="login">
                                </span>
                            </button>
                        </div>
                    </form>

                    <div class="line-divider mb-4">OR</div>

                    <div class="mb-4">
                        <button
                            class="btn btn-light btn-with-icon border w-100 py-3 fw-medium" wire:click="signInWithGoogle"
                            wire:loading.class.remove="btn-with-icon"
                            wire:loading.attr="disabled">
                            <span class="icon" wire:loading.remove wire:target="signInWithGoogle">
                                <img src="{{ asset('images/icon/google.png') }}" alt="Google Icon">
                            </span>
                            <span class="text" wire:loading.remove wire:target="signInWithGoogle">{{ __('Sign In with Google') }}</span>

                            <span
                                class="spinner-border spinner-border-sm text-secondary" aria-hidden="true"
                                wire:loading
                                wire:target="signInWithGoogle">
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 mt-2">
                <div class="col text-center text-md-end fs-md"> {{ __('Don\'t have account?') }} <a
                        href="{{ route('register') }}">{{ __('Sign Up') }}</a></div>
            </div>
        </div>
    </section>
</div>
