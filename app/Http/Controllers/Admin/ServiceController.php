<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function home(){
        $page = 'portfolio';
        return view('pages.portfolio', compact('page'));
    }
    public function index()
    {
        $services = Service::latest()->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'nullable|string',
            'image'   => 'nullable|image|max:4096',
            'meta'    => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        // meta is array in request — cast will convert on save
        $service = Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'nullable|string',
            'image'   => 'nullable|image|max:4096',
            'meta'    => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // delete old
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return back()->with('success', 'Service deleted.');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }
}
