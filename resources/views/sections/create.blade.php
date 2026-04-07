@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Add Section</h2>
    </div>

    <div class="bg-white p-6 rounded shadow">

        <form action="{{ route('sections.store') }}" method="POST">

            @csrf

            <!-- Select Class -->
            <div class="mb-4">

                <label class="block mb-2">Select Class</label>

                <select name="class_id" class="w-full border rounded p-2" required>

                    <option value="">Select Class</option>

                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">
                            {{ $class->class_name }}
                        </option>
                    @endforeach

                </select>

            </div>


            <!-- Section Name -->

            <div>

                <label class="block mb-2">Section Name</label>

                <input type="text" name="section_name" placeholder="Example: A" class="w-full border rounded p-2"
                    required>

            </div>


            <div class="mt-4">

                <button class="btn-primary">
                    Save Section
                </button>

            </div>

        </form>

    </div>
@endsection
