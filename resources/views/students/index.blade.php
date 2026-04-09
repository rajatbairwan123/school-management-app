@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Students
        </h2>

        <a href="{{ route('students.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            Add Student
        </a>

    </div>


    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif



    <div class="bg-white shadow rounded-lg overflow-hidden">

        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">

                <tr>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        #
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        Student
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        Class
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        Section
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        Phone
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                        Action
                    </th>

                </tr>

            </thead>



            <tbody class="bg-white divide-y divide-gray-200">

                @forelse($students as $student)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>


                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $student->user->name ?? '' }}
                        </td>


                        <td class="px-6 py-4">

                            @if ($student->class)
                                <span class="px-2 py-1 text-xs bg-indigo-100 text-indigo-700 rounded">
                                    {{ $student->class->class_name }}
                                </span>
                            @endif

                        </td>



                        <td class="px-6 py-4">

                            @if ($student->section)
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                    {{ $student->section->section_name }}
                                </span>
                            @else
                                <span class="text-gray-400 text-sm">
                                    -
                                </span>
                            @endif

                        </td>



                        <td class="px-6 py-4">
                            {{ $student->phone }}
                        </td>



                        <td class="px-6 py-4 text-right">

                            <div class="flex justify-end gap-4">

                                <a href="{{ route('students.show', $student->id) }}"
                                    class="text-green-600 hover:text-green-800 font-medium">
                                    View
                                </a>

                                <a href="{{ route('students.edit', $student->id) }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                    Edit
                                </a>

                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this student?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-600 hover:text-red-800 font-medium">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="px-6 py-6 text-center text-gray-500">

                            No Students Found

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
@endsection
