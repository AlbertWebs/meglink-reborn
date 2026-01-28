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
        if (Methodology::count() === 0) {
            $this->seedHomepageMethodologies();
        }

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

    private function seedHomepageMethodologies(): void
    {
        $defaults = [
            [
                'step_number' => 1,
                'title' => 'Concept Mood Board',
                'description' => 'Internet sourced images for inspiration and reference, creating a visual direction that captures your vision and project requirements.',
                'icon' => 'fas fa-palette',
                'features' => ['Visual Inspiration', 'Style Direction', 'Reference Images'],
            ],
            [
                'step_number' => 2,
                'title' => 'Proposed Layout',
                'description' => 'Detailed layout report with demolitions and furniture arrangement proposals discussed during our first site visit.',
                'icon' => 'fas fa-ruler-combined',
                'features' => ['Space Planning', 'Furniture Layout', 'Demolition Plans'],
            ],
            [
                'step_number' => 3,
                'title' => 'Virtual Tour & 3D Renders',
                'description' => 'An immersive 3D virtual presentation of interior spaces, bringing your design to life with realistic visualization. High-quality still images compiled from the approved virtual tour, providing detailed visual references for implementation.',
                'icon' => 'fas fa-vr-cardboard',
                'features' => ['3D Visualization', 'Immersive Experience', 'Still Images', 'Detailed Views', '2 Revisions Included'],
            ],
            [
                'step_number' => 4,
                'title' => 'Working Drawings',
                'description' => 'Technical layouts and elevations for installation purposes covering all critical aspects of the interior design.',
                'icon' => 'fas fa-drafting-compass',
                'features' => ['Ceiling Plans', 'Lighting Layouts', 'Plumbing & Tile Works'],
            ],
            [
                'step_number' => 5,
                'title' => 'Project Management',
                'description' => 'Dedicated project manager stationed on-site to ensure quality standards and coordinate all installation processes.',
                'icon' => 'fas fa-clipboard-check',
                'features' => ['Quality Control', 'Team Coordination', 'Material Standards'],
            ],
        ];

        foreach ($defaults as $index => $data) {
            Methodology::updateOrCreate(
                ['step_number' => $data['step_number'], 'title' => $data['title']],
                [
                    'description' => $data['description'],
                    'icon' => $data['icon'],
                    'features' => $data['features'],
                    'order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
