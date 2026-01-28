<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandResource extends Model
{
    protected $fillable = [
        'title',
        'land_purchaser_notice',
        'land_seller',
        'joint_ventures',
        'seo_title',
        'seo_description',
    ];
}
