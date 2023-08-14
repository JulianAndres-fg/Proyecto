<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;

    public function usuario()
        {
            return $this->belongsTo(usuario::class, 'usuario_id', 'usuario_cedula');
        }
    
        public function cliente()
        {
            return $this->belongsTo(cliente::class, 'cliente_id', 'cliente_cedula');
        }
}
