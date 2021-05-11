<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
		'nombre', 'nit', 'direccion', 'telefono', 'persona_contacto', 'email', 'contacto','ciudad'
	];
	public function ingresos(){
    	return $this->hasMany(Ingreso::class);
    }
}
