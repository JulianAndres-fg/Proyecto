<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;

    public function user()
        {
            return $this->belongsTo(User::class, 'usuario_id', 'id');
        }
    
        public function cliente()
        {
            return $this->belongsTo(cliente::class, 'cliente_id', 'cliente_cedula');
        }
}
