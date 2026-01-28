<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service; // Make sure this matches your actual model path
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\ProjectManagementConsultantPage;
use App\Models\RealtorPage;
use App\Models\ProjectManagementConsultantProject;
use App\Models\RealtorListing;

use App\Models\Render;

use App\Models\Land;
use App\Models\LandResource;
use App\Models\Methodology;

class HomeController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $page = 'home';
        return view('home', compact('page','teams'));
    }

    public function portfolio(){
        $page = 'portfolio';
        $Portfolio = Portfolio::all();
        $services = Service::orderBy('title')->get();
        $methodologies = Methodology::where('is_active', true)
            ->orderBy('order')
            ->orderBy('step_number')
            ->get();
        return view('pages.portfolio', compact('page','Portfolio','services','methodologies'));
    }

    public function services(){
        $page = 'services';
        return view('pages.services', compact('page'));
    }

    public function service($slung){
        $page = 'services';
        $service = Service::where('slung', $slung)->firstOrFail();
        return view('pages.service', compact('page','service'));
    }

     public function about()
    {
        $page = 'about';
        $teams = Team::all();
        return view('pages.about', compact('page','teams'));
    }

     public function contact()
    {
        $page = 'contact';
        // You can pass additional data to the view if needed
        return view('pages.contact', compact('page'));
    }

    public function history()
    {
        $page = 'history';
        return view('pages.history', compact('page'));
    }

    public function consultants()
    {
        $page = 'pm-consultants';
        $pmcPage = $this->getProjectManagementConsultantPage();
        $pmcProjects = $this->getProjectManagementConsultantProjects();

        return view('pages.project-management-consultants', compact('page', 'pmcPage', 'pmcProjects'));
    }

    public function realtors()
    {
        $page = 'realtors';
        $realtorPage = $this->getRealtorPage();
        $realtorListings = $this->getRealtorListings();

        return view('pages.realtors', compact('page', 'realtorPage', 'realtorListings'));
    }

    public function project_management_consultant_project(string $slug)
    {
        $page = 'pm-consultants';
        $project = ProjectManagementConsultantProject::where('slug', $slug)->firstOrFail();

        return view('pages.project-management-consultant-project', compact('page', 'project'));
    }

    public function realtor_listing(string $slug)
    {
        $page = 'realtors';
        $listing = RealtorListing::where('slug', $slug)->firstOrFail();
        $relatedListings = RealtorListing::where('id', '!=', $listing->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.realtor-listing', compact('page', 'listing', 'relatedListings'));
    }

      public function updates()
    {
        $page = 'updates';
        $blogs = \App\Models\Blog::latest()->paginate(12);
        return view('pages.blog', compact('page', 'blogs'));
    }

    public function renders()
    {
        $page = 'Renders';
        $renders = Render::latest()->get();
        return view('pages.renders', compact('renders','page'));
    }

 public function update_slung()
    {
        $services = Service::all();

        foreach ($services as $service) {
            $service->slung = Str::slug($service->title, '-');
            $service->save();
        }

        return response()->json(['message' => 'Slung updated for all services.']);
    }
    public function update_portfolio_slungs()
{
    $portfolios = Portfolio::all();

    foreach ($portfolios as $portfolio) {
        $baseSlug = Str::slug($portfolio->title, '-');
        $slug = $baseSlug;
        $counter = 1;

        // Ensure uniqueness (since slung is unique in the schema)
        while (Portfolio::where('slung', $slug)->where('id', '!=', $portfolio->id)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        $portfolio->slung = $slug;
        $portfolio->save();
    }

    return response()->json(['message' => 'Slung updated for all portfolios.']);
}

    /**
     * Display the blog details page.
     *
     * @return \Illuminate\View\View
     */
    public function updates_details()
    {
        return view('pages.blog-details');
    }

    public function portfolio_service($slung)
    {
        // Find the service by slug
        $service = Service::where('slung', $slung)->firstOrFail();

        // Load portfolios related to this service
        $portfolios = $service->portfolios()->latest()->get();

        // Optionally, get all services for the menu
        $allServices = Service::orderBy('title')->get();

        // Return to a view, pass data
        return view('pages.portfolio-by-service', [
            'service' => $service,
            'portfolios' => $portfolios,
            'Service' => $allServices,
            'services' => $allServices,
            'page' => 'portfolio', // for menu highlighting
        ]);
    }
    public function land()
    {
        $page = 'land';

       $landsForSale = Land::where('type', 'sale')->latest()->get();
       $jointVentures = Land::where('type', 'joint_venture')->latest()->get();
       $allLands = Land::latest()->take(6)->get();
       $realtorListings = RealtorListing::latest()->take(6)->get();

       return view('pages.land-for-sale', compact('landsForSale', 'jointVentures', 'allLands', 'realtorListings', 'page'));
    }

    public function land_resources()
    {
        $page = 'land';
        $resource = LandResource::firstOrCreate([], [
            'title' => 'Land Resources',
            'land_purchaser_notice' => 'Before purchasing land, ensure you have conducted a thorough due diligence process. This includes verifying the title deed, checking for any encumbrances or liens, confirming the land is not subject to any disputes, and ensuring all necessary approvals and permits are in place. It is also essential to engage a qualified surveyor to confirm the exact boundaries and acreage of the property.',
            'land_seller' => 'As a land seller, you must provide clear documentation including a valid title deed, survey plans, and any relevant approvals. Ensure the property is free from encumbrances, disputes, or legal complications. It is recommended to have all necessary documentation verified by a legal professional before listing the property for sale.',
            'joint_ventures' => 'Joint Ventures offer a strategic partnership model where resources, risks, and profits are shared between parties. This arrangement is ideal for landowners who want to maximize their property\'s potential without bearing all the development costs alone. Joint ventures typically involve clear agreements on roles, responsibilities, profit-sharing, and exit strategies.',
            'seo_title' => 'Land Resources & Information | Meglink Ventures',
            'seo_description' => 'Essential information for land purchasers, sellers, and joint venture partners. Learn about prerequisites, requirements, and partnership opportunities.',
        ]);

        return view('pages.land-resources', compact('page', 'resource'));
    }

    private function getProjectManagementConsultantPage(): ProjectManagementConsultantPage
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

    private function getRealtorPage(): RealtorPage
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

    private function getProjectManagementConsultantProjects()
    {
        $projects = ProjectManagementConsultantProject::latest()->get();

        if ($projects->isNotEmpty()) {
            return $projects;
        }

        $defaults = [
            [
                'title' => 'Executive Office Fit-Out',
                'location' => 'Nairobi',
                'timeline' => '12 weeks',
                'image' => 'uploads/kitchen.jpg',
                'excerpt' => 'Full project leadership covering spatial planning, coordination, and executive-grade finishing.',
                'body' => "We managed scope, contractor sequencing, and material approvals to deliver a premium executive environment with zero downtime.\n\nOur team led coordination across architectural, electrical, and mechanical scopes while maintaining quality control.",
            ],
            [
                'title' => 'Luxury Apartment Renovation',
                'location' => 'Westlands',
                'timeline' => '8 weeks',
                'image' => 'uploads/wardrobe.jpeg',
                'excerpt' => 'High-end renovation delivering refined finishes, custom joinery, and lighting upgrades.',
                'body' => "Our consultants aligned suppliers and trades to meet a tight programme while protecting the client’s design intent throughout.",
            ],
            [
                'title' => 'Retail Showroom Launch',
                'location' => 'Karen',
                'timeline' => '6 weeks',
                'image' => 'uploads/vanity.jpg',
                'excerpt' => 'Turnkey fit-out with rapid procurement and coordinated shopfitting.',
                'body' => "We delivered a fast-track programme with milestone reporting, ensuring the brand opened on schedule.",
            ],
        ];

        foreach ($defaults as $default) {
            ProjectManagementConsultantProject::create([
                ...$default,
                'slug' => \Illuminate\Support\Str::slug($default['title']),
            ]);
        }

        return ProjectManagementConsultantProject::latest()->get();
    }

    private function getRealtorListings()
    {
        $listings = RealtorListing::latest()->get();

        if ($listings->isNotEmpty()) {
            return $listings;
        }

        $defaults = [
            [
                'title' => 'Two-Bed Apartment Refresh',
                'location' => 'Kilimani',
                'timeline' => '3 weeks',
                'image' => 'uploads/kitchen.jpg',
                'excerpt' => 'Staging and finish updates crafted for fast buyer interest.',
                'body' => "We refreshed lighting, hardware, and paint to reposition the unit for a premium rental audience.\n\nOur team coordinated the staging schedule and ensured photography-ready delivery.",
            ],
            [
                'title' => 'Townhouse Staging & Styling',
                'location' => 'Lavington',
                'timeline' => '2 weeks',
                'image' => 'uploads/wardrobe.jpeg',
                'excerpt' => 'Targeted upgrades and styling to highlight open-plan flow.',
                'body' => "We focused on focal point enhancements, lighting adjustments, and light-touch repairs to elevate the buyer walkthrough experience.",
            ],
            [
                'title' => 'Luxury Rental Upgrade',
                'location' => 'Kileleshwa',
                'timeline' => '4 weeks',
                'image' => 'uploads/vanity.jpg',
                'excerpt' => 'Premium finishing and styling to support a high-value rental listing.',
                'body' => "We coordinated joinery updates, fixture replacement, and on-brand staging to secure a faster lease.",
            ],
        ];

        foreach ($defaults as $default) {
            RealtorListing::create([
                ...$default,
                'slug' => \Illuminate\Support\Str::slug($default['title']),
            ]);
        }

        return RealtorListing::latest()->get();
    }
}
