@extends('layouts.app')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800">
            Edit Student
        </h2>

        <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm hover:bg-gray-300">
            Back
        </a>
    </div>


    <div class="bg-white p-6 rounded-xl shadow-sm border">

        <form action="{{ route('students.update', $student->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                <!-- Student Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Student Name
                    </label>

                    <input type="text" name="name" value="{{ old('name', $student->user->name) }}"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">

                </div>



                <!-- Father Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Father Name
                    </label>

                    <input type="text" name="father_name" value="{{ old('father_name', $student->father_name) }}"
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
                            <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>

                                {{ $class->class_name }}

                            </option>
                        @endforeach

                    </select>

                </div>



                <!-- Section -->
                <div>
                    <label id="section_label" class="block text-sm font-medium text-gray-700 mb-1">
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

                    <input type="date" name="dob" value="{{ old('dob', $student->dob) }}"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">

                </div>



                <!-- Phone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Phone
                    </label>

                    <input type="text" name="phone" value="{{ old('phone', $student->phone) }}"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">

                </div>



                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Address
                    </label>

                    <textarea name="address"
                        rows="3"class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">{{ old('address', $student->address) }}</textarea>

                </div>


            </div>



            <!-- Buttons -->

            <div class="mt-6 flex gap-3">

                <button class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Update Student
                </button>

                <a href="{{ route('students.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                    Cancel
                </a>

            </div>


        </form>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            var selectedSection = "{{ $student->section_id }}";
            var selectedClass = "{{ $student->class_id }}";

            loadSections(selectedClass, selectedSection);


            $('#class_id').on('change', function() {

                var classId = $(this).val();

                loadSections(classId);

            });


            function loadSections(classId, selectedSection = null) {

                if (classId == '') {
                    $('#section_id').html('<option value="">Select Section</option>');
                    return;
                }

                $.ajax({
                    url: '/get-sections/' + classId,
                    type: 'GET',
                    success: function(data) {

                        $('#section_id').html('<option value="">Select Section</option>');

                        if (data.length > 0) {
                            $('#section_label').html('Section <span class="text-red-500">*</span>');
                        } else {
                            $('#section_label').html('Section');
                        }

                        $.each(data, function(key, value) {

                            var selected = '';

                            if (selectedSection == value.id) {
                                selected = 'selected';
                            }

                            $('#section_id').append(
                                '<option value="' + value.id + '" ' + selected + '>' + value
                                .section_name + '</option>'
                            );

                        });

                    }

                });

            }


        });
    </script>
@endpush
