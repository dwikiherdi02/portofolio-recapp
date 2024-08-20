<x-guest-layout>
    <main class="form-signin w-100 m-auto">
        <div class="card border-light-subtle">
            <div class="card-body">
                <p class="text-center text-secondary-emphasis fs-4 m-0 p-0">{{ __('Forgot Your Password?') }}</p>
                <p class="text-center text-secondary">
                    {{ __('No problem. Just let us know your email address and we will email you a password reset link that
                    will allow you to choose a new one.') }}
                </p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control shadow-none rounded-0" name="email" id="email"
                            value="{{ old('email') }}" placeholder="{{ __('Email') }}" required autofocus
                            autocomplete="off">
                        <label for="email">{{ __('Email') }}</label>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">{{ __('Email Password Reset Link') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-guest-layout>

{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
