<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Umedida extends Model
{
    protected $fillable = [
		'nombre','prefijo'
	];
	public function productos(){
    	return $this->hasMany(Producto::class);
    }
}
