<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domoCaracteristica extends Model
{
    use HasFactory;

    public function caracteristica()
        {
            return $this->belongsTo(caracteristica::class, 'caracteristica_id', 'caracteristica_cod');
        }

        public function domo()
        {
            return $this->belongsTo(domo::class, 'domo_id', 'domo_cod');
        }
}
