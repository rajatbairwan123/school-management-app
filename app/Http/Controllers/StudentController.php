<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(['user', 'class', 'section'])
            ->where('school_id', Auth::user()->school_id)
            ->where('status', 1)
            ->latest()
            ->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = SchoolClass::where('school_id', Auth::user()->school_id)
            ->where('status', 1)
            ->get();

        return view('students.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'class_id' => 'required',
            'section_id' => 'nullable|exists:sections,id'
        ]);

        // Create User
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make('1234'),
            'role' => 'student',
            'school_id' => Auth::user()->school_id,
            'status' => 1
        ]);

        // Create Student
        Student::create([
            'user_id' => $user->id,
            'school_id' => Auth::user()->school_id,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id ?? null,
            'father_name' => $request->father_name,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 1
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classes = SchoolClass::where('school_id', Auth::user()->school_id)
            ->where('status', 1)
            ->get();
        return view('students.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $student = Student::findOrFail($id);

    //     $student->update($request->all());

    //     return redirect()->route('students.index')
    //         ->with('success', 'Student Updated Successfully');
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'class_id' => 'required'
        ]);

        $student = Student::with('user')->findOrFail($id);


        // Check if class has sections
        $sectionsExist = Section::where('class_id', $request->class_id)
            ->where('status', 1)
            ->exists();


        if ($sectionsExist && empty($request->section_id)) {
            return back()
                ->withErrors(['section_id' => 'Section is required for selected class'])
                ->withInput();
        }


        // Update User Table (Student Name)
        $student->user->update([
            'name' => $request->name
        ]);


        // Update Student Table
        $student->update([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id ?? null,
            'father_name' => $request->father_name,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'address' => $request->address
        ]);


        return redirect()->route('students.index')
            ->with('success', 'Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student Deleted Successfully');
    }

    public function getSections($id)
    {
        $sections = Section::where('class_id', $id)
            ->where('school_id', Auth::user()->school_id)
            ->where('status', 1)
            ->get();

        return response()->json($sections);
    }
}
