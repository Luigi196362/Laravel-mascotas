<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //
    protected $fillable = [
        'nombre', 'descripcion', 'precio'
    ];

        // En el modelo Servicio
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }


}
