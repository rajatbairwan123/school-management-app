@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Add Class</h2>
    </div>

    <div class="bg-white p-6 rounded shadow">

        <form action="{{ route('classes.store') }}" method="POST">

            @csrf

            <div>

                <label class="block mb-2">Class Name</label>

                <input type="text" name="class_name" class="w-full border rounded p-2" placeholder="Example: Class 1"
                    required>

            </div>

            <div class="mt-4">

                <button class="btn-primary">
                    Save Class
                </button>

            </div>

        </form>

    </div>
@endsection
