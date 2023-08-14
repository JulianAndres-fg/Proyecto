<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planOferta extends Model
{
    use HasFactory;

    public function plan()
        {
            return $this->belongsTo(plan::class, 'plan_id', 'plan_cod');
        }

        public function oferta()
        {
            return $this->belongsTo(oferta::class, 'oferta_id', 'oferta_cod');
        }
}
