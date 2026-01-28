<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandResource;
use Illuminate\Http\Request;

class LandResourceController extends Controller
{
    public function edit()
    {
        $resource = LandResource::firstOrCreate([], [
            'title' => 'Land Resources',
            'land_purchaser_notice' => 'Before purchasing land, ensure you have conducted a thorough due diligence process. This includes verifying the title deed, checking for any encumbrances or liens, confirming the land is not subject to any disputes, and ensuring all necessary approvals and permits are in place. It is also essential to engage a qualified surveyor to confirm the exact boundaries and acreage of the property.',
            'land_seller' => 'As a land seller, you must provide clear documentation including a valid title deed, survey plans, and any relevant approvals. Ensure the property is free from encumbrances, disputes, or legal complications. It is recommended to have all necessary documentation verified by a legal professional before listing the property for sale.',
            'joint_ventures' => 'Joint Ventures offer a strategic partnership model where resources, risks, and profits are shared between parties. This arrangement is ideal for landowners who want to maximize their property\'s potential without bearing all the development costs alone. Joint ventures typically involve clear agreements on roles, responsibilities, profit-sharing, and exit strategies.',
            'seo_title' => 'Land Resources & Information | Meglink Ventures',
            'seo_description' => 'Essential information for land purchasers, sellers, and joint venture partners. Learn about prerequisites, requirements, and partnership opportunities.',
        ]);

        return view('admin.land-resources.edit', compact('resource'));
    }

    public function update(Request $request)
    {
        $resource = LandResource::first();

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'land_purchaser_notice' => ['nullable', 'string'],
            'land_seller' => ['nullable', 'string'],
            'joint_ventures' => ['nullable', 'string'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
        ]);

        if (!$resource) {
            $resource = LandResource::create($validated);
        } else {
            $resource->update($validated);
        }

        return redirect()
            ->route('admin.land-resources.edit')
            ->with('success', 'Land resources updated successfully.');
    }
}
