<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-8">
        <h2 class="text-2xl text-[#10241C]" style="font-family: 'Fraunces', serif; font-weight: 600;">
            Selamat datang kembali
        </h2>
        <p class="text-sm text-gray-500 mt-1">
            Masuk untuk melanjutkan aktivitasmu di Bersihin.
        </p>
    </div>

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
                <input id="remember_me" type="checkbox" class="rounded border-[#D8DED8] text-[#4C9A5B] shadow-sm focus:ring-[#4C9A5B]" name="remember">
                <span class="ms-2 text-sm text-[#10241C]">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
               <a class="underline text-sm text-[#6B7A72] hover:text-[#10241C] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#4C9A5B]" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        @if (Route::has('register'))
            <p class="text-sm text-gray-500 mt-6 text-center">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-[#4C9A5B] font-semibold hover:underline">
                    Daftar sekarang
                </a>
            </p>
        @endif
    </form>
</x-guest-layout>
