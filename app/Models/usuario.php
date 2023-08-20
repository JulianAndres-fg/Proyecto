<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;

    public function role()
        {
            return $this->belongsTo(role::class, 'rol_id', 'rol_cod');
        }
}
