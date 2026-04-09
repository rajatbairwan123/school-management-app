<?php

namespace App\Http\Controllers;

use App\Models\Section;
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
        $classes = SchoolClass::with('sections')
            ->where('school_id', Auth::user()->school_id)
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
            'class_name' => 'required',
            'sections' => 'required|array',
            'sections.*' => 'required'
        ]);

        // Create Class
        $class = SchoolClass::create([
            'school_id' => Auth::user()->school_id,
            'class_name' => $request->class_name,
            'status' => 1
        ]);


        // Insert Sections
        foreach ($request->sections as $section) {

            Section::create([
                'school_id' => Auth::user()->school_id,
                'class_id' => $class->id,
                'section_name' => $section,
                'status' => 1
            ]);
        }


        return redirect()->route('classes.index')
            ->with('success', 'Class & Sections Added Successfully');
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
            'class_name' => 'required',
            'sections' => 'required|array',
            'sections.*' => 'required'
        ]);

        $class = SchoolClass::where('school_id', Auth::user()->school_id)
            ->findOrFail($id);


        // Update Class
        $class->update([
            'class_name' => $request->class_name
        ]);


        // Get Existing Sections
        $existingSections = Section::where('class_id', $class->id)
            ->pluck('id')
            ->toArray();


        $submittedSectionIds = $request->section_ids ?? [];


        // Delete Removed Sections
        $sectionsToDelete = array_diff($existingSections, $submittedSectionIds);

        Section::whereIn('id', $sectionsToDelete)->update([
            'status' => 0
        ]);


        // Update / Insert Sections
        foreach ($request->sections as $key => $sectionName) {

            if (isset($submittedSectionIds[$key])) {

                // Update Existing Section
                Section::where('id', $submittedSectionIds[$key])->update([
                    'section_name' => $sectionName
                ]);
            } else {

                // Insert New Section
                Section::create([
                    'school_id' => Auth::user()->school_id,
                    'class_id' => $class->id,
                    'section_name' => $sectionName,
                    'status' => 1
                ]);
            }
        }


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

        // Delete Sections
        Section::where('class_id', $class->id)->update([
            'status' => 0
        ]);

        // Delete Class
        $class->update([
            'status' => 0
        ]);

        // Soft Delete (Better for ERP)
        $class->update([
            'status' => 0
        ]);

        return redirect()->route('classes.index')
            ->with('success', 'Class Deleted Successfully');
    }
}
