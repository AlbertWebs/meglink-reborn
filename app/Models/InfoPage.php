<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoPage extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'hero_title',
        'hero_subtitle',
        'intro',
        'section_one_title',
        'section_one_body',
        'section_two_title',
        'section_two_body',
        'cta_title',
        'cta_body',
        'cta_button_text',
        'cta_button_link',
    ];
}
