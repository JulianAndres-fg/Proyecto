<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caracteristica extends Model
{
    use HasFactory;
    public function domos()
    {
        return $this->belongsToMany(domo::class, 'domo_caracteristicas', 'caracteristica_id', 'domo_id');
    }
}
