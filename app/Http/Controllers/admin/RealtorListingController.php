<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RealtorListing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RealtorListingController extends Controller
{
    public function index()
    {
        $listings = RealtorListing::latest()->get();

        return view('admin.pages.realtor-listings.index', compact('listings'));
    }

    public function create()
    {
        return view('admin.pages.realtor-listings.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug($data['title']);
        $data['image'] = $this->storeImage($request) ?? null;

        RealtorListing::create($data);

        return redirect()
            ->route('admin.pages.realtor-listings.index')
            ->with('success', 'Listing created.');
    }

    public function edit(RealtorListing $listing)
    {
        return view('admin.pages.realtor-listings.edit', compact('listing'));
    }

    public function update(Request $request, RealtorListing $listing)
    {
        $data = $this->validateData($request, $listing->id);
        $data['slug'] = $this->makeSlug($data['title'], $listing->id);
        $image = $this->storeImage($request);
        if ($image) {
            $data['image'] = $image;
        }

        $listing->update($data);

        return redirect()
            ->route('admin.pages.realtor-listings.index')
            ->with('success', 'Listing updated.');
    }

    public function destroy(RealtorListing $listing)
    {
        $listing->delete();

        return redirect()
            ->route('admin.pages.realtor-listings.index')
            ->with('success', 'Listing deleted.');
    }

    private function validateData(Request $request, ?int $ignoreId = null): array
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
            RealtorListing::where('slug', $slug)
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
        $destination = public_path('uploads/realtor-listings');
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }
        $file->move($destination, $name);

        return 'uploads/realtor-listings/' . $name;
    }
}
