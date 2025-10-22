<?php

// app/Models/Land.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'price',
        'images',
        'type',
    ];

    protected $casts = [
        'images' => 'array', // automatically cast JSON to array
    ];

    public function getTypeAttribute($value)
    {
        return ucfirst(str_replace('_', ' ', $value)); // Convert 'sale' to 'Sale' and 'joint_venture' to 'Joint Venture'
    }
}
