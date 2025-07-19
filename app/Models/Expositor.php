<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expositor extends Model
{
    protected $primaryKey = 'id_expositor';

    use HasFactory;

    protected $table = 'expositores';

    protected $fillable = [
        'especialidad',
        'biografia',
        'nombre',
    ];
}
