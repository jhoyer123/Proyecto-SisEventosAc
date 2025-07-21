<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $primaryKey = 'id_actividad';

    protected $fillable = [
        'nombre',
        'descripcion',
        'hora_inicio',
        'hora_fin',
    ];

    // Relación: Una actividad pertenece a un evento
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'id_evento', 'id_evento');
    }
}
