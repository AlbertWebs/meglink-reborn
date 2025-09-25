<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'blogCount' => Blog::count(),
            'portfolioCount' => Portfolio::count(),
            'serviceCount' => Service::count(),
            'testimonialCount' => Testimonial::count(),
        ]);
    }
}
