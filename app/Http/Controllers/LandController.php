<?php

// app/Http/Controllers/LandController.php
namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandController extends Controller
{
    // List all lands
    public function index()
    {
        $lands = Land::latest()->get();
        return view('admin.lands.index', compact('lands'));
    }

    // Show form to create new land
    public function create()
    {
        return view('admin.lands.create');
    }

    // Store new land
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => 'required|in:sale,joint_venture',  // Validate 'type'
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Handle image upload
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('lands', 'public');
                $images[] = $path;
            }
        }

        Land::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'price' => $request->price,
            'type' => $request->type,  // Store the selected 'type'
            'images' => $images,
        ]);

        return redirect()->route('lands.index')->with('success', 'Land listing created successfully!');
    }


    // Show single land
    public function show(Land $land)
    {
        return view('admin.lands.show', compact('land'));
    }

    // Edit land
    public function edit(Land $land)
    {
        return view('admin.lands.edit', compact('land'));
    }

    // Update land
    public function update(Request $request, Land $land)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => 'required|in:sale,joint_venture',  // Validate 'type'
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Handle image upload
        $images = $land->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('lands', 'public');
                $images[] = $path;
            }
        }

        $land->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'price' => $request->price,
            'type' => $request->type,  // Update the 'type'
            'images' => $images,
        ]);

        return redirect()->route('lands.index')->with('success', 'Land listing updated successfully!');
    }


    // Delete land
    public function destroy(Land $land)
    {
        // Delete images from storage
        if ($land->images) {
            foreach ($land->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $land->delete();
        return redirect()->route('lands.index')->with('success', 'Land listing deleted successfully!');
    }
}
