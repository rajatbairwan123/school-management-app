@extends('layouts.app')

@section('content')
    <div class="flex justify-between mb-6">

        <h2 class="text-2xl font-bold">Sections</h2>

        <a href="{{ route('sections.create') }}" class="btn-primary">
            Add Section
        </a>

    </div>

    @if (session('success'))
        <div class="bg-green-100 p-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">id</th>
                    <th class="p-3">Class</th>
                    <th class="p-3">Section</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($sections as $section)
                    <tr class="border-t">

                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $section->class->class_name }}</td>
                        <td class="p-3">{{ $section->section_name }}</td>

                        <td class="p-3 flex gap-2">

                            <a href="{{ route('sections.edit', $section->id) }}" class="text-blue-600">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('sections.destroy', $section->id) }}">

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
                        <td colspan="4" class="p-3 text-center">
                            No Sections Found
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
@endsection
