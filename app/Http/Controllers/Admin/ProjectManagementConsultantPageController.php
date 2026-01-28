<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectManagementConsultantPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectManagementConsultantPageController extends Controller
{
    public function edit()
    {
        $page = $this->getOrCreateDefaults();

        return view('admin.pages.project-management-consultants', [
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
            'image_one' => ['nullable', 'image', 'max:4096'],
            'image_two' => ['nullable', 'image', 'max:4096'],
            'table_title' => ['nullable', 'string', 'max:255'],
            'table_intro' => ['nullable', 'string'],
            'table_rows' => ['nullable', 'string'],
            'discipline_images' => ['nullable', 'string'],
            'discipline_titles' => ['nullable', 'array'],
            'discipline_titles.*' => ['nullable', 'string', 'max:255'],
            'discipline_descriptions' => ['nullable', 'array'],
            'discipline_descriptions.*' => ['nullable', 'string'],
            'discipline_image_files' => ['nullable', 'array'],
            'discipline_image_files.*' => ['nullable', 'image', 'max:4096'],
            'discipline_image_paths' => ['nullable', 'array'],
            'discipline_image_paths.*' => ['nullable', 'string'],
            'highlights_title' => ['nullable', 'string', 'max:255'],
            'highlights_items' => ['nullable', 'string'],
            'metrics_title' => ['nullable', 'string', 'max:255'],
            'metrics_items' => ['nullable', 'string'],
            'sample_projects_title' => ['nullable', 'string', 'max:255'],
            'sample_projects_intro' => ['nullable', 'string'],
            'sample_projects' => ['nullable', 'string'],
            'cta_title' => ['nullable', 'string', 'max:255'],
            'cta_body' => ['nullable', 'string'],
            'cta_button_text' => ['nullable', 'string', 'max:255'],
            'cta_button_link' => ['nullable', 'string', 'max:255'],
        ]);

        if ($request->hasFile('image_one_file')) {
            $data['image_one'] = $this->storePublicUpload($request->file('image_one_file'));
        } elseif ($request->hasFile('image_one')) {
            $data['image_one'] = $this->storePublicUpload($request->file('image_one'));
        }
        if ($request->hasFile('image_two_file')) {
            $data['image_two'] = $this->storePublicUpload($request->file('image_two_file'));
        } elseif ($request->hasFile('image_two')) {
            $data['image_two'] = $this->storePublicUpload($request->file('image_two'));
        }

        // Process discipline images and rebuild table_rows and discipline_images
        if ($request->has('discipline_titles') && is_array($request->discipline_titles)) {
            $titles = $request->discipline_titles;
            $descriptions = $request->discipline_descriptions ?? [];
            $imageFiles = $request->file('discipline_image_files', []);
            $imagePaths = $request->discipline_image_paths ?? [];
            
            $rows = [];
            $images = [];
            
            foreach ($titles as $index => $title) {
                if (empty(trim($title))) {
                    continue;
                }
                
                $description = $descriptions[$index] ?? '';
                $rows[] = trim($title) . '|' . trim($description);
                
                // Handle image upload
                if (isset($imageFiles[$index]) && $imageFiles[$index]->isValid()) {
                    $images[] = $this->storePublicUpload($imageFiles[$index]);
                } elseif (isset($imagePaths[$index]) && !empty(trim($imagePaths[$index]))) {
                    $images[] = trim($imagePaths[$index]);
                } else {
                    $images[] = '';
                }
            }
            
            $data['table_rows'] = implode("\n", $rows);
            $data['discipline_images'] = implode("\n", $images);
        }

        $page->update($data);

        return redirect()
            ->route('admin.pages.project-management-consultants.edit')
            ->with('success', 'Project management consultants page updated.');
    }

    private function getOrCreateDefaults(): ProjectManagementConsultantPage
    {
        return ProjectManagementConsultantPage::firstOrCreate([], [
            'title' => 'Project Management Consultants',
            'seo_title' => 'Project Management Consultants | Meglink Ventures',
            'seo_description' => 'Project management consultants who align budgets, schedules, and build execution for interior fit-outs and renovations.',
            'hero_title' => 'Project delivery anchored by clarity, control, and craft.',
            'hero_subtitle' => 'We lead interior projects from discovery to handover, keeping scope, budget, and quality aligned.',
            'intro' => "Our project management consultants partner with developers, homeowners, and design teams to deliver interior spaces without surprises. We track scope, manage procurement, and coordinate stakeholders so every phase stays aligned with the intended experience.\n\nOur architects translate your vision into detailed, build-ready plans while safeguarding spatial flow, compliance, and design intent. Our electrical engineers bring intelligent power and lighting strategies that elevate usability and safety. Our mechanical engineers coordinate HVAC, ventilation, and systems integration so comfort and performance are never compromised. Our civil engineers ensure every build is grounded in sound structure, site readiness, and long-term durability.\n\nEvery discipline is led by registered professionals who work together to protect quality, control risk, and deliver a finished space that feels cohesive, compliant, and refined.",
            'image_one' => 'uploads/kitchen.jpg',
            'image_two' => 'uploads/wardrobe.jpeg',
            'table_title' => 'Professional Disciplines',
            'table_intro' => 'Specialist leadership across every technical touchpoint.',
            'table_rows' => "Architects|Design leadership, documentation, compliance, and spatial precision.\nElectrical Engineers|Power distribution, lighting strategy, and safety planning.\nMechanical Engineers|HVAC integration, ventilation, and system performance.\nCivil Engineers|Structural integrity, site coordination, and long-term durability.",
            'discipline_images' => "uploads/kitchen.jpg\nuploads/wardrobe.jpeg\nuploads/vanity.jpg\nuploads/kitchen.jpg",
            'highlights_title' => 'Engagement Highlights',
            'highlights_items' => "Registered professionals guiding every discipline.\nClear scope, reporting, and milestone control.\nProcurement and contractor coordination handled end to end.\nQuality inspections and detailed close-out documentation.",
            'metrics_title' => 'Delivery Metrics',
            'metrics_items' => "Projects Led|120+\nAverage Schedule Adherence|96%\nTrade Partners Coordinated|40+\nAverage Client Satisfaction|4.9/5",
            'sample_projects_title' => 'Sample Projects',
            'sample_projects_intro' => 'Recent engagements that highlight our approach and attention to detail.',
            'sample_projects' => "Executive Office Fit-Out|Nairobi|12 weeks\nLuxury Apartment Renovation|Westlands|8 weeks\nRetail Showroom Launch|Karen|6 weeks",
            'cta_title' => 'Need a consultant to protect your timeline and budget?',
            'cta_body' => 'Let’s define a strategy that keeps your build efficient, transparent, and beautifully executed.',
            'cta_button_text' => 'Book a Consultation',
            'cta_button_link' => '/contact-us',
        ]);
    }

    private function storePublicUpload($file): string
    {
        $name = Str::random(32) . '.' . $file->getClientOriginalExtension();
        $destination = public_path('uploads/pmc');
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }
        $file->move($destination, $name);

        return 'uploads/pmc/' . $name;
    }
}
