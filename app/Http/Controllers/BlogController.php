<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the blog page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page = 'updates';
        return view('pages.blog', compact('page'));
    }

    /**
     * Display the blog details page.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        return view('pages.blog-details');
    }
}
