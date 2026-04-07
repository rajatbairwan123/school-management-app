@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Edit Class</h2>
    </div>

    <div class="bg-white p-6 rounded shadow">

        <form action="{{ route('classes.update', $class->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div>

                <label>Class Name</label>

                <input type="text" name="class_name" value="{{ $class->class_name }}" class="w-full border rounded p-2">

            </div>

            <div class="mt-4">

                <button class="btn-primary">
                    Update Class
                </button>

            </div>

        </form>

    </div>
@endsection
