<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reciboCaja extends Model
{
    use HasFactory;

    public function reserva()
        {
            return $this->belongsTo(reserva::class, 'reserva_id', 'reserva_cod');
        }

    public function metodoDePago()
        {
            return $this->belongsTo(metodoDePago::class, 'metodo_de_pago_id', 'metodo_de_pago_cod');
        }
}
