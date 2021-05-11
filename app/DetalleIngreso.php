<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleIngreso extends Model
{
    protected $fillable = [
		'ingreso_id','producto_id','cantidad_ingreso','precio_ingreso','subtotal'
	];

	use SoftDeletes;

    protected $dates = ['deleted_at'];

	public function ingreso(){
    	return $this->belongsTo(Ingreso::class);
    }
    public function producto(){
    	return $this->belongsTo(Producto::class);
    }
    public function detallesalidas(){
        return $this->hasMany(DetalleSalida::class);
    }
}
