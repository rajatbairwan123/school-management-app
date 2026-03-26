@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-semibold text-gray-700">
        Dashboard
    </h2>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- Students -->
    <div class="card">
        <h3 class="text-gray-500">Total Students</h3>
        <p class="text-3xl font-bold text-primary mt-2">
            120
        </p>
    </div>

    <!-- Teachers -->
    <div class="card">
        <h3 class="text-gray-500">Total Teachers</h3>
        <p class="text-3xl font-bold text-success mt-2">
            12
        </p>
    </div>

    <!-- Classes -->
    <div class="card">
        <h3 class="text-gray-500">Total Classes</h3>
        <p class="text-3xl font-bold text-warning mt-2">
            8
        </p>
    </div>

    <!-- Attendance -->
    <div class="card">
        <h3 class="text-gray-500">Attendance Today</h3>
        <p class="text-3xl font-bold text-danger mt-2">
            95%
        </p>
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