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
        $schoolId = Auth::user()->school_id;

        $totalStudents = Student::where('school_id', $schoolId)
            ->where('status', 1)
            ->count();

        $totalClasses = SchoolClass::where('school_id', $schoolId)
            ->where('status', 1)
            ->count();

        $totalTeachers = User::where('school_id', $schoolId)
            ->where('role', 'admin')
            ->where('status', 1)
            ->count();

        return view('dashboard.index', compact(
            'totalStudents',
            'totalClasses',
            'totalTeachers'
        ));
    }
}
