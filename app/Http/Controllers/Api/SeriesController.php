<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SeriesIndexResource;
use App\Http\Resources\SeriesShowResource;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        
        $perPage = request()->get('per_page', 10);

        $series = Series::query()
            ->select(['id', 'name', 'synopsis', 'type', 'imageUrl'])
            ->paginate($perPage);

        return SeriesIndexResource::collection($series);
    }

    public function show(int $id)
    {
        $series = Series::query()
            ->with('genres')
            ->find($id);

        if (!$series) {
            return response()->json(['message' => 'Series not found'], 404);
        }

        return new SeriesShowResource($series);
    }
}