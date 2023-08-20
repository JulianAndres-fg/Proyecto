<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permisoRole extends Model
{
    use HasFactory;

    public function permiso()
        {
            return $this->belongsTo(permiso::class, 'permiso_id', 'permiso_cod');
        }

    public function role()
        {
            return $this->belongsTo(role::class, 'rol_id', 'rol_cod');
        }
}
