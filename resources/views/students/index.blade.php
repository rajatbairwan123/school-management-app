@extends('layouts.app')

@section('content')
    <div class="flex justify-between mb-6">

        <h2 class="text-2xl font-bold">Students</h2>

        <a href="{{ route('students.create') }}" class="btn-primary">
            Add Student
        </a>

    </div>


    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif


    <div class="bg-white rounded shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-3 text-left">id</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Class</th>
                    <th class="p-3 text-left">Section</th>
                    <th class="p-3 text-left">Phone</th>
                    <th class="p-3 text-left">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($students as $student)
                    <tr class="border-t">

                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $student->user->name ?? '' }}</td>
                        <td class="p-3">{{ $student->class->class_name ?? '' }}</td>
                        <td class="p-3">{{ $student->section->section_name ?? '' }}</td>
                        <td class="p-3">{{ $student->phone }}</td>

                        <td class="p-3 flex gap-2">
                            <a href="{{ route('students.show', $student->id) }}" class="text-green-600">
                                View
                            </a>

                            <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600">
                                Edit
                            </a>

                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="text-red-600">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="p-4 text-center">
                            No Students Found
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
@endsection
