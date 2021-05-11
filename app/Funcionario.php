<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
		'item', 'nombre','apellido','carnet','cargo'
	];
	// public function rubro(){
    // 	return $this->belongsTo(Rubro::class);
    // }
    public function salidas(){
    	return $this->hasMany(Salida::class);
    }

    public function getFullNombreAttribute()
    {
        return "$this->nombre $this->apellido";
    }      
}
