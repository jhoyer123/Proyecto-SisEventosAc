<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asigna extends Model
{
    protected $table = 'asignaciones'; // Asegúrate del nombre exacto

    protected $fillable = [
        'id_administrador',
        'id_evento',
        'id_expositor',
    ];
}
