<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     *
     * Fillable es: listado de campos a rellenar en la tabla en asignacion masiva
     * si en la request recibe + campos no los tendrá en cuenta. Esto es necesario
     * porque en la request está el token y este dato no se inserta en la db lo que provoca un error
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * En caso de que tengamos un formulario con muchos campos, se podría utilizar la siguiente propiedad 
     * para indicar los campos protegidos, que no deben insertarse en db, es lo contrario a $fillable.
     */
    protected $guarded = [];
}
