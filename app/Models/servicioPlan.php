<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicioPlan extends Model
{
    use HasFactory;

    public function plan()
        {
            return $this->belongsTo(plan::class, 'plan_id', 'plan_cod');
        }

        public function servicio()
        {
            return $this->belongsTo(servicio::class, 'servicio_id', 'servicio_cod');
        }
}
