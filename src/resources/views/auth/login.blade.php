<x-guest-layout>
    <main class="form-signin w-100 m-auto">
        <div class="card border-light-subtle">
            <div class="card-body">
                <p class="text-center text-secondary-emphasis fs-4 m-0 p-0">{{ __('Welcome.') }}</p>
                <p class="text-center text-secondary">
                    {{ __('Please enter your credentials to sign in') }}
                </p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating">
                        <input type="email" class="form-control shadow-none rounded-0" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required autofocus autocomplete="off">
                        <label for="email">{{ __('Email') }}</label>
                    </div>
                    <div class="form-floating mb-1">
                        <input type="password" class="form-control shadow-none rounded-0" name="password" id="password" placeholder="{{ __('Password') }}">
                        <label for="password">Password</label>
                    </div>
                    <div class="row row-cols-1 mb-3">
                        <a href="{{ route('password.request') }}" class="col text-end fs-md">Forgot password?</a>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">{{ __('Sign In') }}</button>
                    </div>
                </form>

                <div class="line-divider mb-4">OR</div>

                <div class="mb-4">
                    <button class="btn btn-light btn-with-icon border w-100 py-3 fw-medium">
                        <span class="icon">
                            <img src="{{ asset('images/icon/google.png') }}" alt="Google Icon">
                        </span>
                        <span class="text">{{ __('Sign In with Google') }}</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 mt-2">
            <div class="col text-center text-md-end fs-md"> {{ __('Don\'t have account?') }} <a href="{{ route('register') }}">{{ __('Sign Up') }}</a></div>
        </div>
    </main>
</x-guest-layout>

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
