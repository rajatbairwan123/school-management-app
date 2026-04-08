@extends('layouts.app')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800">
            Add Student
        </h2>

        <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm hover:bg-gray-300">
            Back
        </a>

    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border">

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Student Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Student Name
                    </label>

                    <input type="text" name="name"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <!-- Username -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Username
                    </label>

                    <input type="text" name="username"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" required>

                    {{-- <small class="text-gray-500">
                        Student will login using this username
                    </small> --}}
                </div>

                <!-- Father Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Father Name
                    </label>

                    <input type="text" name="father_name"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Class -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Class
                    </label>

                    <select name="class_id" id="class_id"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">

                        <option value="">Select Class</option>

                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">
                                {{ $class->class_name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- Section -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Section
                    </label>

                    <select name="section_id" id="section_id"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">

                        <option value="">Select Section</option>

                    </select>
                </div>

                <!-- DOB -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Date of Birth
                    </label>

                    <input type="date" name="dob"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Phone
                    </label>

                    <input type="text" name="phone"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Address
                    </label>

                    <textarea name="address" rows="3"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </textarea>
                </div>


            </div>

            <!-- Buttons -->

            <div class="mt-6 flex gap-3">

                <button class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Save Student </button>

                <a href="{{ route('students.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                    Cancel </a>

            </div>

        </form>

    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {

            $('#class_id').on('change', function() {

                var classId = $(this).val();

                $.ajax({
                    url: '/get-sections/' + classId,
                    type: 'GET',
                    success: function(data) {

                        $('#section_id').html('<option>Select Section</option>');

                        $.each(data, function(key, value) {

                            $('#section_id').append(
                                '<option value="' + value.id + '">' + value
                                .section_name + '</option>'
                            );

                        });

                    }
                });

            });

        });
    </script>
@endpush
