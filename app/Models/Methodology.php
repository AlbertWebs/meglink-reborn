<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Methodology extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'step_number',
        'features',
        'order',
        'is_active'
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
        'step_number' => 'integer'
    ];
}
