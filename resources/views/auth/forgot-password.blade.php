<x-guest-layout>

    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Forgot Password
        </h2>
        <p class="text-sm text-gray-500 mt-1">
            Enter your email and we'll send you a reset link
        </p>
    </div>

    <!-- Session Status -->

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit -->
        <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition mb-3">
            Send Reset Link
        </button>

        <!-- Back to Login -->
        <a href="{{ route('login') }}"
            class="block text-center border border-indigo-600 text-indigo-600 py-2 rounded-lg hover:bg-indigo-50 transition">
            Back to Login
        </a>

    </form>

</x-guest-layout>
