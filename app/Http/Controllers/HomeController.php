<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service; // Make sure this matches your actual model path
use App\Models\Portfolio;
use App\Models\Team;

use App\Models\Render;

use App\Models\Land;

class HomeController extends Controller
{
    public function index()
    {
        $page = 'home';
        return view('home', compact('page'));
    }

    public function portfolio(){
        $page = 'portfolio';
        $Portfolio = Portfolio::all();
        return view('pages.portfolio', compact('page','Portfolio'));
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

      public function updates()
    {
        $page = 'updates';
        return view('pages.blog', compact('page'));
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
            'page' => 'portfolio', // for menu highlighting
        ]);
    }
    public function land()
    {
        $page = 'land';

       $landsForSale = Land::where('type', 'sale')->latest()->take(4)->get();
       $jointVentures = Land::where('type', 'joint_venture')->latest()->take(4)->get();

       return view('pages.land-for-sale', compact('landsForSale', 'jointVentures','page'));
    }
}
