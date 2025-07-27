<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Industry;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industries = Industry::latest()->get();
        return view('industries.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('industries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'is_active' => 'boolean',
    ]);

    // Handle checkbox: set is_active to false if not present
    $validated['is_active'] = $request->has('is_active');

    Industry::create($validated);

    return redirect()->route('industries.index')->with('success', 'Industry created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Industry $industry)
    {
        return view('industries.edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Industry $industry)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'is_active' => 'boolean',
    ]);
    // Fix checkbox: if not checked, it's missing from the request
    $validated['is_active'] = $request->has('is_active');

    $industry->update($validated);

    return redirect()->route('industries.index')
                     ->with('success', 'Industry updated sucessfully.');

    }

    public function destroy(Industry $industry)
    {
         $industry->delete();

        return redirect()->route('industries.index')->with('success', 'Industry deleted successfully!');

    }
}
