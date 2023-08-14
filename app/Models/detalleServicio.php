<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleServicio extends Model
{
    use HasFactory;

    public function servicio()
        {
            return $this->belongsTo(servicio::class, 'servicio_id', 'servicio_cod');
        }

        public function reserva()
        {
            return $this->belongsTo(reserva::class, 'reserva_id', 'reserva_cod');
        }
}
