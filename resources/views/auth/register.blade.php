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
            School Registration
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mb-4">
            <x-input-label for="role" :value="__('User Role')" />

            <select name="role" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">

                <option value="">Select Role</option>
                <option value="admin">School Admin</option>
                <option value="teacher">Teacher</option>
                <option value="staff">Staff</option>

            </select>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
            Register
        </button>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-indigo-600">
                Already Registered? Login
            </a>
        </div>

    </form>




</x-guest-layout>
