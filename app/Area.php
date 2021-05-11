<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
		'nombre'
	];
	
	public function destinos(){
    	return $this->hasMany(Destino::class);
    }
}