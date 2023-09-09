<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory;

    protected $primaryKey = 'servicio_cod';

    public function plane()
    {
        return $this->belongsToMany(plane::class, 'servicios_planes', 'servicio_id', 'plan_id');
    }
    public function reserva()
    {
        return $this->belongsToMany(reserva::class, 'detalles_servicios', 'servicio_id', 'reserva_id');
    }
}
