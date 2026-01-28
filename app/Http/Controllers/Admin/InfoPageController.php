<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoPage;
use Illuminate\Http\Request;

class InfoPageController extends Controller
{
    public function edit(string $slug)
    {
        $page = $this->getOrCreateDefaults($slug);

        return view('admin.info-pages.edit', [
            'page' => $page,
            'pageTitle' => $page->title,
        ]);
    }

    public function update(Request $request, string $slug)
    {
        $page = $this->getOrCreateDefaults($slug);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_subtitle' => ['nullable', 'string'],
            'intro' => ['nullable', 'string'],
            'section_one_title' => ['nullable', 'string', 'max:255'],
            'section_one_body' => ['nullable', 'string'],
            'section_two_title' => ['nullable', 'string', 'max:255'],
            'section_two_body' => ['nullable', 'string'],
            'cta_title' => ['nullable', 'string', 'max:255'],
            'cta_body' => ['nullable', 'string'],
            'cta_button_text' => ['nullable', 'string', 'max:255'],
            'cta_button_link' => ['nullable', 'string', 'max:255'],
        ]);

        $page->update($data);

        return redirect()
            ->route('admin.info-pages.edit', $page->slug)
            ->with('success', 'Page updated successfully.');
    }

    private function getOrCreateDefaults(string $slug): InfoPage
    {
        $defaults = $this->defaultContent($slug);

        return InfoPage::firstOrCreate(
            ['slug' => $defaults['slug']],
            $defaults
        );
    }

    private function defaultContent(string $slug): array
    {
        $defaults = [
            'consultants' => [
                'slug' => 'consultants',
                'title' => 'Consultants',
                'hero_title' => 'Consultancy that aligns vision with build reality.',
                'hero_subtitle' => 'Expert guidance, detailed planning, and a clear path from concept to completion.',
                'intro' => 'We work alongside owners, developers, and architects to translate bold ideas into achievable outcomes. Our consultants balance creativity with practicality, ensuring each project is scoped, costed, and coordinated for smooth delivery.',
                'section_one_title' => 'Strategy & Feasibility',
                'section_one_body' => 'We evaluate project intent, budgets, timelines, and risk so decision-makers can move forward with confidence.',
                'section_two_title' => 'Design Leadership',
                'section_two_body' => 'We manage design coordination, specification clarity, and stakeholder alignment to keep projects efficient and intentional.',
                'cta_title' => 'Need a consulting partner for your next build?',
                'cta_body' => 'Let us shape the scope, define the deliverables, and steer the project toward a strong, measurable result.',
                'cta_button_text' => 'Book a Consultation',
                'cta_button_link' => '/contact-us',
            ],
            'realtors' => [
                'slug' => 'realtors',
                'title' => 'Realtors',
                'hero_title' => 'Property partners who elevate presentation and value.',
                'hero_subtitle' => 'From staging to fit-out, we help listings stand out and close with confidence.',
                'intro' => 'We collaborate with realtors to improve property appeal, highlight differentiators, and accelerate interest. Our finishes, styling, and renovation support position listings at the top of the market.',
                'section_one_title' => 'Listing Readiness',
                'section_one_body' => 'We refine lighting, finishes, and focal points to create standout listing photos and walkthrough experiences.',
                'section_two_title' => 'Value-Driven Upgrades',
                'section_two_body' => 'We recommend and execute upgrades that drive buyer interest without unnecessary spend.',
                'cta_title' => 'Want to elevate your next listing?',
                'cta_body' => 'Partner with us to transform space quickly and present it at its very best.',
                'cta_button_text' => 'Schedule a Walkthrough',
                'cta_button_link' => '/contact-us',
            ],
        ];

        return $defaults[$slug] ?? $defaults['consultants'];
    }
}
