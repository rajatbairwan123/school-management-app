<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\SchoolClass;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::with('class')->latest()->get();

        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = SchoolClass::all();
        return view('sections.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Section::create([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name
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
        $section = Section::findOrFail($id);
        $classes = SchoolClass::all();

        return view('sections.edit', compact('section', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $section = Section::findOrFail($id);

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
        Section::findOrFail($id)->delete();

        return redirect()->route('sections.index')
            ->with('success', 'Section Deleted Successfully');
    }
}
