<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = SchoolClass::latest()->get();

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
        SchoolClass::create([
            'class_name' => $request->class_name
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
        $class = SchoolClass::findOrFail($id);

        return view('classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $class = SchoolClass::findOrFail($id);

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
        SchoolClass::findOrFail($id)->delete();

        return redirect()->route('classes.index')
            ->with('success', 'Class Deleted Successfully');
    }
}
