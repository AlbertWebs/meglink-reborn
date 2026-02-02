<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenderImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_link',
        'render_id',
    ];

    public function render()
    {
        return $this->belongsTo(Render::class);
    }
}
