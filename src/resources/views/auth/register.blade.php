<x-guest-layout>
    <main class="form-signin w-100 m-auto">
        <div class="card border-light-subtle">
            <div class="card-body">
                <p class="text-center text-secondary-emphasis fs-4 m-0 p-0">{{ __('Let\'s start!') }}</p>
                <p class="text-center text-secondary">
                    {{-- {{ __('Easily track spending, set budgets, and generate reports to take control of your finances.') }} --}}
                    {{ __('Start your journey to financial freedom by tracking spending and setting budgets.') }}
                </p>

                <div class="mb-4">
                    <button class="btn btn-light btn-with-icon border w-100 py-3 fw-medium">
                        <span class="icon">
                            <img src="{{ asset('images/icon/google.png') }}" alt="Google Icon">
                        </span>
                        <span class="text">{{ __('Sign Up with Google') }}</span>
                    </button>
                </div>

                <div class="line-divider mb-2">OR</div>

                <div class="mb-4">
                    <a href="{{ route('login') }}" class="btn btn-link w-100 fw-bolder">{{ __('Sign In') }}</a>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
