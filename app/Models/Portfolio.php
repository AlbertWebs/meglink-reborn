<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['title','content','image','meta','service_id'];


    public function service() { return $this->belongsTo(Service::class); }
    public function images() { return $this->hasMany(PortfolioImage::class); }
}
