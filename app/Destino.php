<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $fillable = [
		'nombre','sigla','area_id'
	];
	public function salidas(){
    	return $this->hasMany(Salida::class);
    }

    public function ingresos(){
    	return $this->hasMany(Ingreso::class);
    }

    public function getFullDestinoAttribute()
    {
        return "$this->sigla | $this->nombre";
    }
    public function area(){
        return $this->belongsTo(Area::class);
    }
}
