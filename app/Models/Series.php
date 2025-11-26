<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Series extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\SeriesFactory> */
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'synopsis',
        'type',
        'status',
        'imageUrl',
        'studio',
        'episodes',
    ];

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getImageUrl(string $conversion = 'preview'): string
    {
        $mediaUrl = $this->getFirstMediaUrl('covers', $conversion);
        if ($mediaUrl) {
            return $mediaUrl;
        }

        if (!empty($this->imageUrl)) {
            return $this->imageUrl;
        }

        return 'https://placehold.co/300x450?text=No+Image';
    }
    
    public function registerMediaConversions(Media|\Spatie\MediaLibrary\MediaCollections\Models\Media|null $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit(Fit::Crop, 300, 450)
            ->nonQueued();

        $this->addMediaConversion('website')
            ->fit(Fit::Crop, 600, 900)
            ->nonQueued();
    }

    /**
     * Custom Helper to get Image
     */

}
