<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    //
    protected $fillable = [
        'mascota_id', 'servicio_id','estado'
    ];

        // En el modelo Cita
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

}
