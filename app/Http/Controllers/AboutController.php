<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $page = 'about';
        return view('pages.about', compact('page'));
    }
}
