<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::latest()->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('slides', 'public');

        Slide::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $path,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.slides.index')->with('success', 'Slide added successfully!');
    }

    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        $data = $request->only('title', 'subtitle', 'is_active');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($slide->image);
            $data['image'] = $request->file('image')->store('slides', 'public');
        }

        $slide->update($data);

        return redirect()->route('admin.slides.index')->with('success', 'Slide updated successfully!');
    }

    public function destroy(Slide $slide)
    {
        Storage::disk('public')->delete($slide->image);
        $slide->delete();

        return back()->with('success', 'Slide deleted.');
    }
}
