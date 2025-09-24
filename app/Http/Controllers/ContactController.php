<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $page = 'contact';
        // You can pass additional data to the view if needed
        return view('pages.contact', compact('page'));
    }
}
