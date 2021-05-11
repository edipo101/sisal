<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $fillable = [
		'nombre'
	];
	public function conductors(){
    	return $this->hasMany(Conductor::class);
    }
    public function mecanicos(){
    	return $this->hasMany(Mecanico::class);
    }
}
