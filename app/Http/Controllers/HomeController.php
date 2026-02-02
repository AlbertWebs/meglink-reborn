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

    public function team()
    {
        $page = 'team';
        $teams = Team::all();
        return view('pages.team', compact('page', 'teams'));
    }

    public function consultants()
    {
        $page = 'pm-consultants';
        $pmcPage = $this->getProjectManagementConsultantPage();
        $pmcProjects = ProjectManagementConsultantProject::latest()->get();
        return view('pages.project-management-consultants', compact('page', 'pmcPage', 'pmcProjects'));
    }

    public function project_management_consultant_project($slug)
    {
        $page = 'pm-consultants';
        $project = ProjectManagementConsultantProject::where('slug', $slug)->firstOrFail();
        return view('pages.project-management-consultant-project', compact('page', 'project'));
    }

    public function realtors()
    {
        $page = 'realtors';
        $realtorPage = $this->getRealtorPage();
        return view('pages.realtors', compact('page', 'realtorPage'));
    }

    public function realtor_listing($slug)
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
        $renders = Render::with('images')->latest()->get();
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
            'table_intro' => 'Our registered professionals bring deep expertise across architecture, engineering, and project coordination.',
            'sample_projects_intro' => 'Recent projects that showcase our ability to deliver complex interiors on time and within budget.',
            'cta_title' => 'Ready to start your project?',
            'cta_body' => 'Let\'s discuss how our project management approach can streamline your next interior fit-out or renovation.',
            'cta_button_text' => 'Schedule a Consultation',
        ]);
    }

    private function getRealtorPage(): RealtorPage
    {
        return RealtorPage::firstOrCreate([], [
            'title' => 'Realtors',
            'seo_title' => 'Realtor Services | Meglink Ventures',
            'seo_description' => 'Fast turnarounds, curated staging, and value-driven upgrades that elevate each listing.',
            'hero_title' => 'Listings that feel curated, confident, and ready to close.',
            'hero_subtitle' => 'We collaborate with realtors to sharpen presentation, elevate perception, and increase buyer interest.',
            'intro' => 'Our realtor services are designed for speed and impact. We understand that listings need to stand out quickly, so we focus on high-impact improvements that make properties more marketable and appealing to potential buyers.',
            'image_one' => 'uploads/kitchen.jpg',
            'image_two' => 'uploads/wardrobe.jpeg',
            'table_title' => 'Realtor Services',
            'table_intro' => 'Focused support designed for quick turnarounds and market impact.',
            'sample_projects_intro' => 'Showcase-ready transformations completed with speed and care.',
            'cta_title' => 'Want to make your next listing stand out?',
            'cta_body' => 'Partner with us to elevate your property presentation and close faster.',
            'cta_button_text' => 'Schedule a Walkthrough',
        ]);
    }
}
