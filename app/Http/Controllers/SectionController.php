<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\SchoolClass;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::where('school_id', Auth::user()->school_id)
            ->where('status', 1)
            ->latest()
            ->get();

        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = SchoolClass::where('school_id', Auth::user()->school_id)
            ->where('status', 1)
            ->get();

        return view('sections.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'section_name' => 'required'
        ]);

        Section::create([
            'school_id' => Auth::user()->school_id,
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'status' => 1
        ]);

        return redirect()->route('sections.index')
            ->with('success', 'Section Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $section = Section::where('school_id', Auth::user()->school_id)
            ->findOrFail($id);

        $classes = SchoolClass::where('school_id', Auth::user()->school_id)
            ->where('status', 1)
            ->get();

        return view('sections.edit', compact('section', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',
            'section_name' => 'required'
        ]);

        $section = Section::where('school_id', Auth::user()->school_id)
            ->findOrFail($id);

        $section->update([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name
        ]);

        return redirect()->route('sections.index')
            ->with('success', 'Section Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $section = Section::where('school_id', Auth::user()->school_id)
            ->findOrFail($id);

        // Soft delete
        $section->update([
            'status' => 0
        ]);

        return redirect()->route('sections.index')
            ->with('success', 'Section Deleted Successfully');
    }
}
