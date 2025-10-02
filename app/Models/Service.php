<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title', 'content', 'image', 'meta', 'slung'];


    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
