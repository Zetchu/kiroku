<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class AdminSeriesExportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $series = Series::all();

        $exportData = $series->map(function ($item) {
            return [
                'ID' => $item->id,
                'Name' => $item->name,
                'Type' => $item->type,
                'Status' => $item->status,
                'Studio' => $item->studio,
                'Created At' => $item->created_at->format('Y-m-d'),
            ];
        });
        
        return $exportData;
    }
}