<x-guest-layout>

    <!-- School Logo -->
    <div class="text-center mb-4">
        @if (isset($school->logo))
            <img src="{{ asset('schools/' . $school->logo) }}" class="h-16 mx-auto mb-2">
        @endif

        <h2 class="text-2xl font-bold text-gray-800">
            {{ $school->name ?? 'School Management System' }}
        </h2>

        <p class="text-gray-500 text-sm">
            Login to continue
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <!-- Remember -->
        <div class="flex justify-between mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="remember">
                <span class="ml-2 text-sm">Remember</span>
            </label>

            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600">
                Forgot Password?
            </a>
        </div>

        <!-- Login -->
        <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
            Login
        </button>

        <!-- Register -->
        <a href="{{ route('register') }}"
            class="block text-center mt-3 border border-indigo-600 text-indigo-600 py-2 rounded-lg">
            Register New School User
        </a>

    </form>






</x-guest-layout>
