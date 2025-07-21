<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Obtiene el perfil de Participante asociado con el usuario.
     */
    public function participante()
    {
        // Un usuario TIENE UN perfil de participante.
        // El segundo argumento es la clave foránea en la tabla 'participantes'.
        return $this->hasOne(Participante::class, 'id_usuario');
    }

    /**
     * Obtiene el perfil de Administrador asociado con el usuario.
     */
    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'id_usuario');
    }

    /**
     * Obtiene el perfil de Control asociado con el usuario.
     */
    public function control()
    {
        return $this->hasOne(Control::class, 'id_usuario');
    }
}
