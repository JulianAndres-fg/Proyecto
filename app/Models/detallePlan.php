<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallePlan extends Model
{
    use HasFactory;

    public function plan()
        {
            return $this->belongsTo(plan::class, 'plan_id', 'plan_cod');
        }

        public function reserva()
        {
            return $this->belongsTo(reserva::class, 'reserva_id', 'reserva_cod');
        }
}
