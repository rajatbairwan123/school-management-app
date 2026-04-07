@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Edit Student</h2>
    </div>

    <div class="bg-white p-6 rounded shadow">

        <form action="{{ route('students.update', $student->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">

                <!-- Name -->
                <div>
                    <label>Student Name</label>
                    <input type="text" name="name" value="{{ $student->name }}" class="w-full border rounded p-2">
                </div>

                <!-- Father Name -->
                <div>
                    <label>Father Name</label>
                    <input type="text" name="father_name" value="{{ $student->father_name }}"
                        class="w-full border rounded p-2">
                </div>

                <!-- Class -->
                <div>
                    <label>Class</label>
                    <input type="text" name="class" value="{{ $student->class }}" class="w-full border rounded p-2">
                </div>

                <!-- Section -->
                <div>
                    <label>Section</label>
                    <input type="text" name="section" value="{{ $student->section }}" class="w-full border rounded p-2">
                </div>

                <!-- DOB -->
                <div>
                    <label>DOB</label>
                    <input type="date" name="dob" value="{{ $student->dob }}" class="w-full border rounded p-2">
                </div>

                <!-- Phone -->
                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ $student->phone }}" class="w-full border rounded p-2">
                </div>

                <!-- Address -->
                <div class="col-span-2">
                    <label>Address</label>
                    <textarea name="address" class="w-full border rounded p-2">{{ $student->address }}</textarea>
                </div>

            </div>

            <div class="mt-6">
                <button class="btn-primary">
                    Update Student
                </button>
            </div>

        </form>

    </div>
@endsection
