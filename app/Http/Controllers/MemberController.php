<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use App\Models\Division;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Member::query();

        // Apply filters
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('phone')) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->filled('division')) {
            $query->where('division', $request->division );
        }

        $members = $query->paginate(10);
        $divisions = Division::all(); // Fetch all divisions

        return view('members.index', compact('members', 'divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();
        $cities = City::all();
        $divisions = Division::where('active', 1)->get(); // Only active divisions
        return view('members.create', compact('provinces', 'cities', 'divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:20',
            'name' => 'required|string|max:150',
            'address' => 'required|string',
            'phone' => 'required|string|max:16',
            'email' => 'required|email|max:100',
            'province' => 'required|string|max:10',
            'city' => 'required|integer',
            'division' => 'required|integer',
            'joint_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Member::create($validated);
        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        $portfolios = $member->portfolios; // Fetch member portfolios
        return view('members.show', compact('member', 'portfolios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        $provinces = Province::all();
        $cities = City::all();
        $divisions = Division::where('active', 1)->get(); // Only active divisions
        return view('members.edit', compact('member', 'provinces', 'cities', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:20',
            'name' => 'required|string|max:150',
            'address' => 'required|string',
            'phone' => 'required|string|max:16',
            'email' => 'required|email|max:100',
            'province' => 'required|string|max:10',
            'city' => 'required|integer',
            'division' => 'required|integer',
            'joint_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $member->update($validated);
        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
