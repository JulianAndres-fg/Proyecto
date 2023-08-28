<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domo extends Model
{
    use HasFactory;
    public function caracteristicas()
    {
        return $this->belongsToMany(caracteristica::class, 'domo_caracteristicas', 'domo_id', 'caracteristica_id');
    }
}
