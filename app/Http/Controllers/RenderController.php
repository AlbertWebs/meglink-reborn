<?php

namespace App\Http\Controllers;

use App\Models\Render;
use Illuminate\Http\Request;

class RenderController extends Controller
{
    public function index()
    {
        $renders = Render::latest()->get();
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
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = $request->file('image')->store('renders', 'public');

        Render::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $path,
        ]);

        return redirect()->route('renders.index')->with('success', 'Render uploaded successfully!');
    }

    // Show edit form
    public function edit(Render $render)
    {
        return view('admin.renders.edit', compact('render'));
    }

    // Update existing render
    public function update(Request $request, Render $render)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Replace image if new one is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            if ($render->image && Storage::disk('public')->exists($render->image)) {
                Storage::disk('public')->delete($render->image);
            }

            $path = $request->file('image')->store('renders', 'public');
            $render->image = $path;
        }

        // Update text fields
        $render->title = $validated['title'];
        $render->description = $validated['description'] ?? '';
        $render->save();

        return redirect()->route('renders.index')->with('success', 'Render updated successfully.');
    }

    // Delete render
    public function destroy(Render $render)
    {
        if ($render->image && Storage::disk('public')->exists($render->image)) {
            Storage::disk('public')->delete($render->image);
        }

        $render->delete();

        return redirect()->route('renders.index')->with('success', 'Render deleted successfully.');
    }
}
