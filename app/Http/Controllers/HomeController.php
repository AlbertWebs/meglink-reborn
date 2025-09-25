<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = 'home';
        return view('home', compact('page'));
    }

    public function portfolio(){
        $page = 'portfolio';
        return view('pages.portfolio', compact('page'));
    }

    public function services(){
        $page = 'services';
        return view('pages.services', compact('page'));
    }

     public function about()
    {
        $page = 'about';
        return view('pages.about', compact('page'));
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

    /**
     * Display the blog details page.
     *
     * @return \Illuminate\View\View
     */
    public function updates_details()
    {
        return view('pages.blog-details');
    }
}
