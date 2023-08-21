<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plane extends Model
{
    use HasFactory;

    public function domo()
        {
            return $this->belongsTo(domo::class, 'domo_id', 'domo_cod');
        }
}
