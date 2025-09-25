<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::first();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'phone_number' => 'nullable|string',
            'email'        => 'nullable|email',
            'website'      => 'nullable|url',
            'facebook'     => 'nullable|url',
            'instagram'    => 'nullable|url',
            'linkedin'     => 'nullable|url',
            'tiktok'       => 'nullable|url',
            'twitter'      => 'nullable|url',
        ]);

        $settings = Setting::first();
        $settings ? $settings->update($data) : Setting::create($data);

        return back()->with('success', 'Settings updated successfully.');
    }
}
