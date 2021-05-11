<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model {
    protected $fillable = [
		'nombre'
	];
	
	public function ingresos(){
    	return $this->hasMany(Ingreso::class);
    }
    public function salidas(){
    	return $this->hasMany(Salida::class);
    }
    public function users(){
    	return $this->hasMany(User::class);
    }
}