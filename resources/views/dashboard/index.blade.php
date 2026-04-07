@extends('layouts.app')

@section('content')
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Students -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-gray-500">Total Students</h2>
                <p class="text-3xl font-bold">{{ $totalStudents ?? 0 }}</p>
            </div>

            <!-- Teachers -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-gray-500">Total Teachers</h2>
                <p class="text-3xl font-bold">{{ $totalTeachers ?? 0 }}</p>
            </div>

            <!-- Classes -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-gray-500">Total Classes</h2>
                <p class="text-3xl font-bold">{{ $totalClasses ?? 0 }}</p>
            </div>

        </div>

    </div>

    <!-- Recent Activity Section -->

    <div class="mt-8">

        <div class="card">

            <h3 class="text-lg font-semibold mb-4">
                Recent Activities
            </h3>

            <ul class="space-y-3">

                <li class="border-b pb-2">
                    New student added
                </li>

                <li class="border-b pb-2">
                    Teacher assigned to Class 1
                </li>

                <li class="border-b pb-2">
                    Fees collected
                </li>

            </ul>

        </div>

    </div>
@endsection
