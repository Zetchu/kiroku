<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index()
    {
        // Business logic goes here

        $trendingSeries = Series::inRandomOrder()->take(6)->get();
        return view('welcome', compact('trendingSeries'));
    }
}
