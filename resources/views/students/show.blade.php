@extends('layouts.app')

@section('content')
    <div class="mb-6 flex justify-between">

        <h2 class="text-2xl font-bold">
            Student Profile
        </h2>

        <a href="{{ route('students.index') }}" class="btn-primary">
            Back
        </a>

    </div>


    <div class="bg-white shadow rounded p-6">

        <div class="grid grid-cols-2 gap-6">

            <div>
                <label class="text-gray-500">Student Name</label>
                <p class="font-semibold">{{ $student->name }}</p>
            </div>

            <div>
                <label class="text-gray-500">Father Name</label>
                <p class="font-semibold">{{ $student->father_name }}</p>
            </div>

            <div>
                <label class="text-gray-500">Class</label>
                <p class="font-semibold">
                    {{ $student->class->class_name ?? '' }}
                </p>
            </div>

            <div>
                <label class="text-gray-500">Section</label>
                <p class="font-semibold">
                    {{ $student->section->section_name ?? '' }}
                </p>
            </div>

            <div>
                <label class="text-gray-500">Date of Birth</label>
                <p class="font-semibold">{{ $student->dob }}</p>
            </div>

            <div>
                <label class="text-gray-500">Phone</label>
                <p class="font-semibold">{{ $student->phone }}</p>
            </div>

            <div class="col-span-2">
                <label class="text-gray-500">Address</label>
                <p class="font-semibold">{{ $student->address }}</p>
            </div>

            <div>
                <label class="text-gray-500">Created At</label>
                <p class="font-semibold">
                    {{ $student->created_at->format('d M Y') }}
                </p>
            </div>

        </div>

    </div>
@endsection
