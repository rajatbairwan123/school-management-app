<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = SchoolClass::where('school_id', Auth::user()->school_id)
            ->where('status', 1)
            ->latest()
            ->get();

        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required'
        ]);

        SchoolClass::create([
            'school_id' => Auth::user()->school_id,
            'class_name' => $request->class_name,
            'status' => 1
        ]);

        return redirect()->route('classes.index')
            ->with('success', 'Class Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $class = SchoolClass::where('school_id', Auth::user()->school_id)
            ->findOrFail($id);

        return view('classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_name' => 'required'
        ]);

        $class = SchoolClass::where('school_id', Auth::user()->school_id)
            ->findOrFail($id);

        $class->update([
            'class_name' => $request->class_name
        ]);

        return redirect()->route('classes.index')
            ->with('success', 'Class Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $class = SchoolClass::where('school_id', Auth::user()->school_id)
            ->findOrFail($id);

        // Soft Delete (Better for ERP)
        $class->update([
            'status' => 0
        ]);

        return redirect()->route('classes.index')
            ->with('success', 'Class Deleted Successfully');
    }
}
