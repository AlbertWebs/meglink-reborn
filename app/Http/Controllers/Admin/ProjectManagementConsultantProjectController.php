<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectManagementConsultantProject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectManagementConsultantProjectController extends Controller
{
    public function index()
    {
        $projects = ProjectManagementConsultantProject::latest()->get();

        return view('admin.pages.project-management-consultant-projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.pages.project-management-consultant-projects.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug($data['title']);
        $data['image'] = $this->storeImage($request) ?? null;

        ProjectManagementConsultantProject::create($data);

        return redirect()
            ->route('admin.pages.project-management-consultant-projects.index')
            ->with('success', 'Project created.');
    }

    public function edit(ProjectManagementConsultantProject $pmcProject)
    {
        return view('admin.pages.project-management-consultant-projects.edit', [
            'project' => $pmcProject,
        ]);
    }

    public function update(Request $request, ProjectManagementConsultantProject $pmcProject)
    {
        $data = $this->validateData($request, $pmcProject->id);
        $data['slug'] = $this->makeSlug($data['title'], $pmcProject->id);
        $image = $this->storeImage($request);
        if ($image) {
            $data['image'] = $image;
        }

        $pmcProject->update($data);

        return redirect()
            ->route('admin.pages.project-management-consultant-projects.index')
            ->with('success', 'Project updated.');
    }

    public function destroy(ProjectManagementConsultantProject $pmcProject)
    {
        $pmcProject->delete();

        return redirect()
            ->route('admin.pages.project-management-consultant-projects.index')
            ->with('success', 'Project deleted.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'timeline' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
        ]);
    }

    private function makeSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $counter = 1;

        while (
            ProjectManagementConsultantProject::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }

    private function storeImage(Request $request): ?string
    {
        if (!$request->hasFile('image_file')) {
            return null;
        }

        $file = $request->file('image_file');
        $name = Str::random(32) . '.' . $file->getClientOriginalExtension();
        $destination = public_path('uploads/pmc-projects');
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }
        $file->move($destination, $name);

        return 'uploads/pmc-projects/' . $name;
    }
}
