<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealtorPage extends Model
{
    protected $fillable = [
        'title',
        'seo_title',
        'seo_description',
        'hero_title',
        'hero_subtitle',
        'intro',
        'image_one',
        'image_two',
        'table_title',
        'table_intro',
        'table_rows',
        'sample_listing_images',
        'sample_projects_title',
        'sample_projects_intro',
        'sample_projects',
        'cta_title',
        'cta_body',
        'cta_button_text',
        'cta_button_link',
    ];
}
