<?php

namespace SIS;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
	 * Los atributos que son asignados masivamente.
	 *
	 * @var array
	 */
    protected $fillable = [
        'nombre', 'nickname', 'password', 'estado', 'almacen_id'
    ];
    
    /**
	 * Los atributos que son ocultados.
	 *
	 * @var array
	 */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function almacen(){
    	return $this->belongsTo(Almacen::class);
    }

    
    /**
	 * Convertir el atributo nombre a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value);
    }

    /**
     * Metodo para Encriptar el password de un usuario 
     * 
     * @var value
     */
    public function setPasswordAttribute($value)
    {
        if(!empty($value))
            $this->attributes['password'] = \Hash::make($value);
    }

    /**
     * Darle nombre al estado dependiendo de la letra
     *
     * A: ACTIVO
     * D: INACTIVO
     *
     */
    public function getFullEstadoAttribute()
    {
        return $this->estado=='A' ? 'ACTIVO' : 'INACTIVO';
    }

    /**
     * Darle nombre al estado dependiendo de la letra
     *
     * Obtener el nombre de almacen
     *
     */
    public function getNombreAlmacenAttribute()
    {
        $nom_alma = Almacen::find(auth()->user()->almacen_id);
        return $nom_alma->nombre;
    }
}
