<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    //
    protected $fillable = [
        'nombre', 'especie', 'raza', 'edad', 'peso', 'dueño', 'imagen', 'contacto'
    ];

        // En el modelo Mascota
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

}
