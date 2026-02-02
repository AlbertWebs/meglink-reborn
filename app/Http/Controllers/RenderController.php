<?php

namespace App\Http\Controllers;

use App\Models\Render;
use App\Models\RenderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RenderController extends Controller
{
    public function index()
    {
        $renders = Render::with('images')->latest()->get();
        return view('admin.renders.index', compact('renders'));
    }

    public function create()
    {
        return view('admin.renders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'images'      => 'required|array|min:1',
            'images.*'    => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Create render with first image as main image (for backward compatibility)
        $firstImage = $request->file('images')[0];
        $mainImagePath = $firstImage->store('renders', 'public');

        $render = Render::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $mainImagePath,
        ]);

        // Store all images
        foreach ($request->file('images') as $image) {
            $path = $image->store('renders/gallery', 'public');
            $render->images()->create(['image_link' => $path]);
        }

        return redirect()->route('renders.index')->with('success', 'Render uploaded successfully!');
    }

    // Show edit form
    public function edit(Render $render)
    {
        $render->load('images');
        return view('admin.renders.edit', compact('render'));
    }

    // Update existing render
    public function update(Request $request, Render $render)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update text fields
        $render->title = $validated['title'];
        $render->description = $validated['description'] ?? '';
        $render->save();

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('renders/gallery', 'public');
                $render->images()->create(['image_link' => $path]);
            }
        }

        return redirect()->route('renders.index')->with('success', 'Render updated successfully.');
    }

    // Delete render
    public function destroy(Render $render)
    {
        if ($render->image && Storage::disk('public')->exists($render->image)) {
            Storage::disk('public')->delete($render->image);
        }

        // Delete all associated images
        foreach ($render->images as $image) {
            if (Storage::disk('public')->exists($image->image_link)) {
                Storage::disk('public')->delete($image->image_link);
            }
        }

        $render->delete();

        return redirect()->route('renders.index')->with('success', 'Render deleted successfully.');
    }

    // Delete a single render image
    public function destroyImage(RenderImage $renderImage)
    {
        if (Storage::disk('public')->exists($renderImage->image_link)) {
            Storage::disk('public')->delete($renderImage->image_link);
        }

        $renderImage->delete();

        return back()->with('success', 'Image removed successfully.');
    }
}
