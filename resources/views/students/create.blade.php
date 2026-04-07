@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Add Student</h2>
    </div>

    <div class="bg-white p-6 rounded shadow">

        <form action="{{ route('students.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-2 gap-4">

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium">Student Name</label>
                    <input type="text" name="name" class="w-full border rounded p-2" required>
                </div>

                <!-- Father Name -->
                <div>
                    <label class="block text-sm font-medium">Father Name</label>
                    <input type="text" name="father_name" class="w-full border rounded p-2">
                </div>

                <!-- Class -->

                <div>

                    <label>Class</label>

                    <select name="class_id" id="class_id" class="w-full border rounded p-2">

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

                    <label>Section</label>

                    <select name="section_id" id="section_id" class="w-full border rounded p-2">

                        <option value="">Select Section</option>

                    </select>

                </div>

                <!-- DOB -->
                <div>
                    <label class="block text-sm font-medium">Date of Birth</label>
                    <input type="date" name="dob" class="w-full border rounded p-2">
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-medium">Phone</label>
                    <input type="text" name="phone" class="w-full border rounded p-2">
                </div>

                <!-- Address -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium">Address</label>
                    <textarea name="address" class="w-full border rounded p-2"></textarea>
                </div>

            </div>

            <div class="mt-6">
                <button class="btn-primary">
                    Save Student
                </button>
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
