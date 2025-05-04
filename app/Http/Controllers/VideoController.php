<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:videos',
            'name' => 'required',
            'url' => 'required|url',
            'description' => 'nullable|string',
        ]);

        Video::create(array_merge($request->all(), [
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]));

        return redirect()->route('videos.index')->with('success', 'Video created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'code' => 'required|unique:videos,code,' . $video->id,
            'name' => 'required',
            'url' => 'required|url',
            'description' => 'nullable|string',
        ]);

        $video->update(array_merge($request->all(), [
            'updated_by' => auth()->id(),
        ]));

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }
}
