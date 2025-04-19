<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::paginate(10);
        return view('photos.index', compact('photos'));
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:photos,code|max:255',
            'name' => 'required|string|max:255',
            'publish' => 'required|boolean',
            'file_path' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);

        $path = $request->file('file_path')->store('photos', 'public');
        Photo::create([
            'code' => $request->code,
            'name' => $request->name,
            'publish' => $request->publish,
            'file_path' => $path,
            'description' => $request->description,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('photos.index')->with('success', 'Photo created successfully.');
    }

    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }

    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'code' => 'required|string|unique:photos,code,' . $photo->id . '|max:255',
            'name' => 'required|string|max:255',
            'publish' => 'required|boolean',
            'file_path' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['code', 'name', 'publish', 'description']);
        $data['updated_by'] = auth()->id();

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('photos', 'public');
        }

        $photo->update($data);

        return redirect()->route('photos.index')->with('success', 'Photo updated successfully.');
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photos.index')->with('success', 'Photo deleted successfully.');
    }
}
