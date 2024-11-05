<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Summary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    public function index()
    {
        $summaries = Summary::all();
        $experiences = Experience::all();
        $educations = Education::all();
        $title = 'About';
        $desc = 'Welcome to my personal portfolio, where I share my works, experiences, and achievements';

        return view('about', compact('summaries', 'experiences', 'educations', 'title', 'desc'));  
    }

}
