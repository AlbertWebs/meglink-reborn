<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RealtorPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RealtorPageController extends Controller
{
    public function edit()
    {
        $page = $this->getOrCreateDefaults();

        return view('admin.pages.realtors', [
            'page' => $page,
        ]);
    }

    public function update(Request $request)
    {
        $page = $this->getOrCreateDefaults();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_subtitle' => ['nullable', 'string'],
            'intro' => ['nullable', 'string'],
            'image_one_file' => ['nullable', 'image', 'max:4096'],
            'image_two_file' => ['nullable', 'image', 'max:4096'],
            'table_title' => ['nullable', 'string', 'max:255'],
            'table_intro' => ['nullable', 'string'],
            'table_rows' => ['nullable', 'string'],
            'sample_projects_title' => ['nullable', 'string', 'max:255'],
            'sample_projects_intro' => ['nullable', 'string'],
            'sample_listing_images' => ['nullable', 'string'],
            'sample_projects' => ['nullable', 'string'],
            'cta_title' => ['nullable', 'string', 'max:255'],
            'cta_body' => ['nullable', 'string'],
            'cta_button_text' => ['nullable', 'string', 'max:255'],
            'cta_button_link' => ['nullable', 'string', 'max:255'],
        ]);

        if ($request->hasFile('image_one_file')) {
            $data['image_one'] = $this->storePublicUpload($request->file('image_one_file'));
        }
        if ($request->hasFile('image_two_file')) {
            $data['image_two'] = $this->storePublicUpload($request->file('image_two_file'));
        }

        $page->update($data);

        return redirect()
            ->route('admin.pages.realtors.edit')
            ->with('success', 'Realtors page updated.');
    }

    private function getOrCreateDefaults(): RealtorPage
    {
        return RealtorPage::firstOrCreate([], [
            'title' => 'Realtors',
            'seo_title' => 'Realtor Partnerships | Meglink Ventures',
            'seo_description' => 'Realtor support services that elevate listings with staging, styling, and value-driven upgrades.',
            'hero_title' => 'Listings that feel curated, confident, and ready to close.',
            'hero_subtitle' => 'We collaborate with realtors to sharpen presentation, elevate perception, and increase buyer interest.',
            'intro' => 'We help realtors present properties at their best. From targeted improvements to full refreshes, we support listing performance with a practical, brand-aligned approach.',
            'image_one' => 'uploads/kitchen.jpg',
            'image_two' => 'uploads/vanity.jpg',
            'table_title' => 'Realtor Services',
            'table_intro' => 'Focused support designed for quick turnarounds and market impact.',
            'table_rows' => "Listing Prep & Styling|Curate lighting, textures, and focal points for standout showings.\nValue-Driven Upgrades|Identify quick improvements with the highest buyer impact.\nPre-Sale Refreshes|Coordinate paint, flooring, and fixture updates efficiently.\nOn-Call Support|Fast response for urgent walkthroughs and re-listing needs.",
            'sample_projects_title' => 'Sample Listings',
            'sample_projects_intro' => 'Showcase-ready transformations completed with speed and care.',
            'sample_listing_images' => "uploads/kitchen.jpg\nuploads/wardrobe.jpeg\nuploads/vanity.jpg",
            'sample_projects' => "Two-Bed Apartment Refresh|Kilimani|3 weeks\nTownhouse Staging & Styling|Lavington|2 weeks\nLuxury Rental Upgrade|Kileleshwa|4 weeks",
            'cta_title' => 'Want to make your next listing stand out?',
            'cta_body' => 'Partner with us to elevate your property presentation and close faster.',
            'cta_button_text' => 'Schedule a Walkthrough',
            'cta_button_link' => '/contact-us',
        ]);
    }

    private function storePublicUpload($file): string
    {
        $name = Str::random(32) . '.' . $file->getClientOriginalExtension();
        $destination = public_path('uploads/realtors');
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }
        $file->move($destination, $name);

        return 'uploads/realtors/' . $name;
    }
}
