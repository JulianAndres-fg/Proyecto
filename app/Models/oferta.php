<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oferta extends Model
{
    use HasFactory;
    public function plane()
    {
        return $this->belongsToMany(plane::class, 'plan_ofertas', 'oferta_id', 'plan_id');
    }
}
