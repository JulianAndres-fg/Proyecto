<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plane extends Model
{
    use HasFactory;
    protected $primaryKey = 'plan_cod';

    public function domo()
    {
        return $this->belongsTo(domo::class, 'domo_id', 'domo_cod');
    }

    public function servicio()
    {
        return $this->belongsToMany(servicio::class, 'servicios_planes', 'plan_id', 'servicio_id');
    }
  
    public function oferta()
    {
        return $this->belongsToMany(oferta::class, 'plan_ofertas', 'plan_id', 'oferta_id');
    }
}
