<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = [
        'fecha_inscripcion',
        'id_participante',
        'id_evento',
        'id_pago',
    ];

    public function participante()
    {
        return $this->belongsTo(Participante::class, 'id_participante');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'id_evento');
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }
}
