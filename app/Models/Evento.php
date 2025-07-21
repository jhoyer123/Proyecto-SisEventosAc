<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $primaryKey = 'id_evento';

    protected $fillable = [
        'nombre_evento',
        'descripcion',
        'tipo_evento',
        'fecha_evento',
        'ubicacion',
        'precio',
        'hora_inicio',
        'hora_fin',
        'id_administrador'
    ];

    //public $timestamps = true;

    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_administrador', 'id_administrador');
    }

    public function actividades()
    {
        return $this->hasMany(Actividad::class, 'id_evento', 'id_evento');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }
}
