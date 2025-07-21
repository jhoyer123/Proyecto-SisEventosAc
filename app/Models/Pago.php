<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $primaryKey = 'id_pago'; 

    protected $fillable = [
        'monto',
        'fecha_pago',
        'metodo_pago',
    ];

    // Relación: Un pago pertenece a una inscripción
    public function inscripcion()
    {
        return $this->hasOne(Inscripcion::class, 'id_inscripcion');
    }
}
