@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard
        </h1>
    </div>


    <!-- Stats Cards -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Students -->
        <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm opacity-80">
                        Total Students
                    </p>

                    <h2 class="text-3xl font-bold">
                        {{ $totalStudents ?? 0 }}
                    </h2>
                </div>

                <div class="text-4xl opacity-70">
                    👨‍🎓
                </div>

            </div>

        </div>


        <!-- Teachers -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm opacity-80">
                        Total Teachers
                    </p>

                    <h2 class="text-3xl font-bold">
                        {{ $totalTeachers ?? 0 }}
                    </h2>
                </div>

                <div class="text-4xl opacity-70">
                    👩‍🏫
                </div>

            </div>

        </div>



        <!-- Classes -->
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm opacity-80">
                        Total Classes
                    </p>

                    <h2 class="text-3xl font-bold">
                        {{ $totalClasses ?? 0 }}
                    </h2>
                </div>

                <div class="text-4xl opacity-70">
                    🏫
                </div>

            </div>

        </div>

    </div>



    <!-- Quick Actions -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

        <a href="{{ route('students.create') }}" class="bg-white shadow rounded-xl p-6 hover:shadow-lg transition">

            <h3 class="font-semibold text-gray-700">
                Add Student
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Create new student record
            </p>

        </a>



        <a href="#" class="bg-white shadow rounded-xl p-6 hover:shadow-lg transition">

            <h3 class="font-semibold text-gray-700">
                Add Teacher
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Create new teacher record
            </p>

        </a>



        <a href="{{ route('classes.create') }}" class="bg-white shadow rounded-xl p-6 hover:shadow-lg transition">

            <h3 class="font-semibold text-gray-700">
                Add Class
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Create class & sections
            </p>

        </a>

    </div>



    <!-- Recent Activity -->

    <div class="mt-8">

        <div class="bg-white shadow rounded-xl p-6">

            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                Recent Activities
            </h3>

            <ul class="space-y-3">

                <li class="flex justify-between border-b pb-2">
                    <span>New student added</span>
                    <span class="text-gray-400 text-sm">Today</span>
                </li>

                <li class="flex justify-between border-b pb-2">
                    <span>Teacher assigned to Class 1</span>
                    <span class="text-gray-400 text-sm">Yesterday</span>
                </li>

                <li class="flex justify-between border-b pb-2">
                    <span>Fees collected</span>
                    <span class="text-gray-400 text-sm">2 days ago</span>
                </li>

            </ul>

        </div>

    </div>
@endsection
