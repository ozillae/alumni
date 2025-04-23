<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::paginate(10); // Tambahkan pagination
        return view('divisions.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:divisions|max:255',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'active' => 'required|boolean',
        ]);

        $validated['created_by'] = Auth::id(); // Set the authenticated user as the creator
        $validated['updated_by'] = Auth::id(); // Set the authenticated user as the updater

        Division::create($validated);

        return redirect()->route('divisions.index')->with('success', 'Division created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        return view('divisions.show', compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        return view('divisions.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'code' => 'required|unique:divisions,code,' . $division->id . '|max:255',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'active' => 'required|boolean',
        ]);

        $validated['updated_by'] = Auth::id(); // Update the updater field

        $division->update($validated);

        return redirect()->route('divisions.index')->with('success', 'Division updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()->route('divisions.index')->with('success', 'Division deleted successfully.');
    }
}
