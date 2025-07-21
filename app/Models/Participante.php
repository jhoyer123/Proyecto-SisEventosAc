<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;
    // Y que no es autoincremental, ya que viene de la tabla users
    public $incrementing = false;
    //protected $primaryKey = 'id_participante'; // Clave primaria personalizada

    protected $primaryKey = 'id_participante'; // Clave primaria personalizada

    public $timestamps = false;

    protected $table = 'participantes';

    protected $fillable = [
        'fecha_nac',
    ];

    /**
     * Obtiene el usuario al que pertenece este perfil de participante.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_participante', 'id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }
}
