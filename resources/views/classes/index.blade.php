@extends('layouts.app')

@section('content')
    <div class="flex justify-between mb-6">

        <h2 class="text-2xl font-bold">Classes</h2>

        <a href="{{ route('classes.create') }}" class="btn-primary">
            Add Class
        </a>

    </div>


    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif


    <div class="bg-white shadow rounded">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-3">id</th>
                    <th class="p-3">Class Name</th>
                    <th class="p-3">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($classes as $class)
                    <tr class="border-t">

                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $class->class_name }}</td>

                        <td class="p-3 flex gap-2">

                            <a href="{{ route('classes.edit', $class->id) }}" class="text-blue-600">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('classes.destroy', $class->id) }}">

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
                        <td colspan="3" class="p-3 text-center">
                            No Classes Found
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
@endsection
