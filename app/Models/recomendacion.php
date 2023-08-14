<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recomendacion extends Model
{
    use HasFactory;

    public function reserva()
        {
            return $this->belongsTo(reserva::class, 'reserva_id', 'reserva_cod');
        }
}
