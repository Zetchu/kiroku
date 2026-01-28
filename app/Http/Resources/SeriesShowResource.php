<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeriesShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'synopsis' => $this->synopsis,
            'status' => $this->status,
            'studio' => $this->studio,
            'episodes' => $this->episodes,
            'image_url' => $this->getImageUrl('website'),
            'genres' => GenreResource::collection($this->whenLoaded('genres')),
        ];
    }
}