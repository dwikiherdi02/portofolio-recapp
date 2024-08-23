<?php

use App\Livewire\Forms\CreatePasswordForm;

use function Livewire\Volt\{boot, layout, title, form};

layout('layouts.default');

title('Create Password');

form(CreatePasswordForm::class);

boot(function () {
    if (!empty(auth()->user()->password)) {
        return redirect()->route('dashboard');
    }
});

$create = function() {
    $this->validate();

    $this->form->save();
}

?>

<div>
    <section class="d-flex align-items-center justify-content-center vh-100 overflow-hidden">
        <div class="form-create-password w-100 m-auto">
            <div class="card border-light-subtle">
                <div class="card-body">
                    <p class="text-center text-secondary-emphasis fs-4 m-0 p-0">{{ __('Create Password.') }}</p>
                    <p class="text-center text-secondary">
                        {{ __('Make your password unforgettable, but unforgettable to hackers.') }}
                    </p>
                    <form wire:submit="create">
                        <div class="input-group has-validation mb-4">
                            <div class="form-floating {{ $errors->has('form.password') ? 'is-invalid' : '' }}">
                                <input type="password" class="form-control shadow-none rounded-0 {{ $errors->has('form.password') ? 'is-invalid' : '' }}" wire:model="form.password" name="password" id="password" placeholder="{{ __('Password') }}">
                                <label for="password">{{ __('Password') }}</label>
                            </div>
                            <div class="invalid-feedback">
                                {{ collect($errors->get('form.password'))->first() }}
                            </div>
                        </div>
                        <div class="input-group has-validation mb-4">
                            <div class="form-floating {{ $errors->has('form.password_confirmation') ? 'is-invalid' : '' }}">
                                <input type="password" class="form-control shadow-none rounded-0 {{ $errors->has('form.password_confirmation') ? 'is-invalid' : '' }}" wire:model="form.password_confirmation" name="password_confirmation" id="password-confirmation" placeholder="{{ __('Password Confirmation') }}">
                                <label for="password">{{ __('Password Confirmation') }}</label>
                            </div>
                            <div class="invalid-feedback">
                                {{ collect($errors->get('form.password_confirmation'))->first() }}
                            </div>
                        </div>
                        <div class="mb-4">
                            <button
                                type="submit"
                                class="btn btn-primary w-100 py-3 fw-bold"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove>{{ __('Create') }}</span>

                                <span class="spinner-border spinner-border-sm" aria-hidden="true" wire:loading></span>
                                <span role="status" wire:loading>Creating...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
