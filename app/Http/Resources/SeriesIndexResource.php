<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class SeriesIndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'synopsis_short' => Str::limit($this->synopsis, 50),
            'image_url' => $this->getImageUrl('preview'),
            'type' => $this->type,
            'api_link' => route('api.series.show', ['id' => $this->id]),
        ];
    }
}