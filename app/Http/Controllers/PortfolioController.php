<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(){
        $page = 'portfolio';
        return view('pages.portfolio', compact('page'));
    }
}
