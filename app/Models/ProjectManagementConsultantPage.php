<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectManagementConsultantPage extends Model
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
        'discipline_images',
        'highlights_title',
        'highlights_items',
        'metrics_title',
        'metrics_items',
        'sample_projects_title',
        'sample_projects_intro',
        'sample_projects',
        'cta_title',
        'cta_body',
        'cta_button_text',
        'cta_button_link',
    ];
}
