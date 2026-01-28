<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Methodology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MethodologyController extends Controller
{
    public function index()
    {
        $methodologies = Methodology::orderBy('order')->orderBy('step_number')->paginate(15);
        return view('admin.methodologies.index', compact('methodologies'));
    }

    public function create()
    {
        return view('admin.methodologies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'step_number' => 'required|integer|min:1',
            'features' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        // Convert features string to array
        if (!empty($data['features'])) {
            $features = array_filter(array_map('trim', explode(',', $data['features'])));
            $data['features'] = $features;
        } else {
            $data['features'] = [];
        }

        $data['is_active'] = $request->has('is_active') ? true : false;
        $data['order'] = $data['order'] ?? 0;

        Methodology::create($data);

        return redirect()->route('admin.methodologies.index')->with('success', 'Methodology step created successfully.');
    }

    public function show(Methodology $methodology)
    {
        return view('admin.methodologies.edit', compact('methodology'));
    }

    public function update(Request $request, Methodology $methodology)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'step_number' => 'required|integer|min:1',
            'features' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        // Convert features string to array
        if (!empty($data['features'])) {
            $features = array_filter(array_map('trim', explode(',', $data['features'])));
            $data['features'] = $features;
        } else {
            $data['features'] = [];
        }

        $data['is_active'] = $request->has('is_active') ? true : false;
        $data['order'] = $data['order'] ?? 0;

        $methodology->update($data);

        return redirect()->route('admin.methodologies.index')->with('success', 'Methodology step updated successfully.');
    }

    public function destroy(Methodology $methodology)
    {
        $methodology->delete();
        return redirect()->route('admin.methodologies.index')->with('success', 'Methodology step deleted successfully.');
    }
}
