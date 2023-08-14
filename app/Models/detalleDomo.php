<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleDomo extends Model
{
    use HasFactory;

    public function domo()
    {
        return $this->belongsTo(domo::class, 'domo_id', 'domo_cod');
    }

    public function reserva()
        {
            return $this->belongsTo(reserva::class, 'reserva_id', 'reserva_cod');
        }
}
