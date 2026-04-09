@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Student Profile
        </h2>

        <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
            Back
        </a>

    </div>


    <!-- Profile Header -->

    <div class="bg-white shadow rounded-xl p-6 mb-6">

        <div class="flex items-center gap-6">

            <!-- Avatar -->
            <div
                class="w-20 h-20 bg-indigo-100 text-indigo-600 flex items-center justify-center rounded-full text-2xl font-bold">

                {{ strtoupper(substr($student->user->name ?? 'S', 0, 1)) }}

            </div>


            <!-- Student Info -->

            <div>

                <h3 class="text-xl font-semibold text-gray-800">
                    {{ $student->user->name ?? '' }}
                </h3>

                <div class="flex gap-2 mt-2">

                    @if ($student->class)
                        <span class="px-2 py-1 text-xs bg-indigo-100 text-indigo-700 rounded">
                            {{ $student->class->class_name }}
                        </span>
                    @endif

                    @if ($student->section)
                        <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                            Section {{ $student->section->section_name }}
                        </span>
                    @endif

                </div>

            </div>

        </div>

    </div>



    <!-- Profile Details -->

    <div class="bg-white shadow rounded-xl p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


            <!-- Student Name -->
            <div>
                <label class="text-gray-500 text-sm">
                    Student Name
                </label>

                <p class="font-semibold text-gray-800">
                    {{ $student->user->name ?? '' }}
                </p>
            </div>



            <!-- Father Name -->
            <div>
                <label class="text-gray-500 text-sm">
                    Father Name
                </label>

                <p class="font-semibold text-gray-800">
                    {{ $student->father_name }}
                </p>
            </div>



            <!-- Class -->
            <div>
                <label class="text-gray-500 text-sm">
                    Class
                </label>

                <p class="font-semibold text-gray-800">
                    {{ $student->class->class_name ?? '-' }}
                </p>
            </div>



            <!-- Section -->
            <div>
                <label class="text-gray-500 text-sm">
                    Section
                </label>

                <p class="font-semibold text-gray-800">
                    {{ $student->section->section_name ?? '-' }}
                </p>
            </div>



            <!-- DOB -->
            <div>
                <label class="text-gray-500 text-sm">
                    Date of Birth
                </label>

                <p class="font-semibold text-gray-800">
                    {{ $student->dob ?? '-' }}
                </p>
            </div>



            <!-- Phone -->
            <div>
                <label class="text-gray-500 text-sm">
                    Phone
                </label>

                <p class="font-semibold text-gray-800">
                    {{ $student->phone ?? '-' }}
                </p>
            </div>



            <!-- Address -->
            <div class="md:col-span-2">
                <label class="text-gray-500 text-sm">
                    Address
                </label>

                <p class="font-semibold text-gray-800">
                    {{ $student->address ?? '-' }}
                </p>
            </div>



            <!-- Created -->
            <div>
                <label class="text-gray-500 text-sm">
                    Created At
                </label>

                <p class="font-semibold text-gray-800">
                    {{ $student->created_at->format('d M Y') }}
                </p>
            </div>


        </div>

    </div>
@endsection
