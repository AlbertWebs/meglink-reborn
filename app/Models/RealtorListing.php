<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealtorListing extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'location',
        'timeline',
        'image',
        'video_mp4',
        'video_youtube',
        'excerpt',
        'body',
        'closing_content',
    ];
}
