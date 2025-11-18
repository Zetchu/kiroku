<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    /** @use HasFactory<\Database\Factories\SeriesFactory> */
    use HasFactory;



    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
