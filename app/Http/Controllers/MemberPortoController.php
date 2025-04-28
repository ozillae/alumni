<?php

namespace App\Http\Controllers;

use App\Models\MemberPorto;
use Illuminate\Http\Request;

class MemberPortoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if($user->member == null){
            return redirect('member/dashboard');
        }

        $portfolios = MemberPorto::where('member_id', $user->member)->get();
        return view('member_porto.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member_porto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        MemberPorto::create([
            'title' => $request->title,
            'institution' => $request->institution,
            'description' => $request->description,
            'member_id' => auth()->user()->member,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('portofolio.index')->with('success', 'Portfolio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberPorto $memberPorto, $id)
    {
        // dd($id);
        $memberPorto = MemberPorto::findOrFail($id);
        return view('member_porto.show', compact('memberPorto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemberPorto $memberPorto, $id)
    {
        $memberPorto = MemberPorto::findOrFail($id);

        return view('member_porto.edit', compact('memberPorto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MemberPorto $memberPorto, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // dd($memberPorto);

        $memberPorto = MemberPorto::find($id);
        if (!$memberPorto) {
            return back()->with('error', 'Data tidak ditemukan');
        }


        $memberPorto->update([
            'title' => $request->title,
            'institution' => $request->institution,
            'description' => $request->description,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('portofolio.index')->with('success', 'Portfolio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberPorto $memberPorto)
    {
        $memberPorto->delete();
        return redirect()->route('portofolio.index')->with('success', 'Portfolio deleted successfully.');
    }
}
