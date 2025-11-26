<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    function index()
    {
        // Business logic goes here

        $trendingSeries = Cache::remember('trending_series', 1, function () {
            return Series::withAvg('reviews', 'rating')
                ->orderByDesc('reviews_avg_rating')
                ->take(6)
                ->get();
        });
        return view('welcome', compact('trendingSeries'));
    }
}
