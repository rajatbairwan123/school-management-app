@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Edit Section</h2>
    </div>

    <div class="bg-white p-6 rounded shadow">

        <form action="{{ route('sections.update', $section->id) }}" method="POST">

            @csrf
            @method('PUT')

            <!-- Class Dropdown -->

            <div class="mb-4">

                <label>Select Class</label>

                <select name="class_id" class="w-full border rounded p-2">

                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ $section->class_id == $class->id ? 'selected' : '' }}>

                            {{ $class->class_name }}

                        </option>
                    @endforeach

                </select>

            </div>


            <!-- Section Name -->

            <div>

                <label>Section Name</label>

                <input type="text" name="section_name" value="{{ $section->section_name }}"
                    class="w-full border rounded p-2">

            </div>


            <div class="mt-4">

                <button class="btn-primary">
                    Update Section
                </button>

            </div>

        </form>

    </div>
@endsection
