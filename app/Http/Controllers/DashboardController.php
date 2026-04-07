<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = 0;
        $totalTeachers = 0;
        $totalClasses = 0;

        return view('dashboard.index', compact(
            'totalStudents',
            'totalTeachers',
            'totalClasses'
        ));
    }
}