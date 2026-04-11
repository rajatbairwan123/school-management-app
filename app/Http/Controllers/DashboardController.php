<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd($user->role); // debug
        $schoolId = $user->school_id;

        // Admin Dashboard Data
        if ($user->role == 'admin') {

            $totalStudents = Student::where('school_id', $schoolId)
                ->where('status', 1)
                ->count();

            $totalClasses = SchoolClass::where('school_id', $schoolId)
                ->where('status', 1)
                ->count();

            $totalTeachers = User::where('school_id', $schoolId)
                ->where('role', 'teacher') // <- changed (admin nahi teacher hona chahiye)
                ->where('status', 1)
                ->count();

            return view('dashboard.index', compact(
                'totalStudents',
                'totalClasses',
                'totalTeachers'
            ));
        }

        // Teacher Dashboard Data
        if ($user->role == 'teacher') {

            return view('dashboard.index');
        }

        // Student Dashboard Data
        if ($user->role == 'student') {
            return view('dashboard.index');
        }

        return view('dashboard.index');
    }
}
