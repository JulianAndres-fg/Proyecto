<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;
    protected $primaryKey = 'reserva_cod';

    public function user()
        {
            return $this->belongsTo(User::class, 'usuario_id', 'id');
        }

    public function domo()
        {
            return $this->belongsTo(domo::class, 'domo_id', 'domo_cod');
        }
    
        public function cliente()
        {
            return $this->belongsTo(cliente::class, 'cliente_id', 'cliente_cedula');
        }

        public function metodoDePago()
        {
            return $this->belongsTo(metodoDePago::class, 'metodo_de_pago_id', 'metodo_de_pago_cod');
        }


        public function servicio()
        {
            return $this->belongsToMany(servicio::class, 'detalles_servicios', 'reserva_id', 'servicio_id');
        }
}
