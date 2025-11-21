<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'series_id',
        'status',
        'rating',
        'progress',
    ];

    /**
     * A review belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A review belongs to a series.
     */
    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
