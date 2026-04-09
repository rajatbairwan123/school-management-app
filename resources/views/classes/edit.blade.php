@extends('layouts.app')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">
            Edit Class
        </h2>

        <a href="{{ route('classes.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
            Back
        </a>
    </div>


    <div class="bg-white shadow rounded-lg">

        <form action="{{ route('classes.update', $class->id) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Class Name -->
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Class Name
                    </label>

                    <input type="text" name="class_name" value="{{ $class->class_name }}"
                        class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" required>

                </div>

            </div>



            <!-- Sections -->
            <div class="px-6 pb-6">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Sections <span class="text-red-500">*</span>
                </label>


                <div id="section-wrapper">

                    @foreach ($class->sections as $section)
                        <div class="flex gap-2 mb-2 section-row">

                            <input type="text" name="sections[]" value="{{ $section->section_name }}"
                                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                required>

                            <input type="hidden" name="section_ids[]" value="{{ $section->id }}">

                            <button type="button" class="bg-red-500 text-white px-3 rounded-lg remove-section">
                                X
                            </button>

                        </div>
                    @endforeach


                </div>


                <button type="button" id="add-section" class="mt-2 text-indigo-600 hover:text-indigo-800 font-medium">

                    + Add More Section

                </button>

            </div>



            <!-- Footer -->

            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 rounded-b-lg">

                <a href="{{ route('classes.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">

                    Cancel

                </a>

                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">

                    Update Class

                </button>

            </div>


        </form>

    </div>
@endsection



@push('scripts')
    <script>
        $(document).ready(function() {

            // Add Section

            $('#add-section').click(function() {

                var html = `
<div class="flex gap-2 mb-2 section-row">

<input type="text"
name="sections[]"
class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
placeholder="Section Name"
required>

<button type="button"
class="bg-red-500 text-white px-3 rounded-lg remove-section">
X
</button>

</div>
`;

                $('#section-wrapper').append(html);

            });



            // Remove Section

            $(document).on('click', '.remove-section', function() {

                if ($('.section-row').length > 1) {
                    $(this).closest('.section-row').remove();
                }

            });


        });
    </script>
@endpush
