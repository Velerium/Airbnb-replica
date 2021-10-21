<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Sponsorship;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allApt = Apartment::with('sponsorship')->get();  
        return view('homepage', compact('allApt'));
    }
}
