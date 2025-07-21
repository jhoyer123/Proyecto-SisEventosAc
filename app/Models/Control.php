<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $table = 'controles';

    protected $primaryKey = 'id_control';

    public $incrementing = false;

    protected $fillable = [
        'id_control',
        // Otros campos si tienes más
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_control', 'id');
    }
}
