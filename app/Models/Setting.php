<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    protected $fillable = [
        'phone_number',
        'phone_number_secondary',
        'email',
        'website',
        'facebook',
        'instagram',
        'linkedin',
        'tiktok',
        'twitter',
    ];
}
