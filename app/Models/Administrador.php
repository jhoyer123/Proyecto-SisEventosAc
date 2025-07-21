<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';

    protected $primaryKey = 'id_administrador';

    public $incrementing = false; // Porque hereda el id de user

    //public $timestamps = true;
    protected $fillable = [
        'id_administrador',
        // Otros campos si tienes más
    ];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'id_administrador', 'id_administrador');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_administrador', 'id');
    }
}
