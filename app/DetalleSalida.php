<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleSalida extends Model
{
    protected $fillable = [
		'salida_id','detalle_ingreso_id','cantidad_salida','precio_salida','subtotal'
	];

	use SoftDeletes;

    protected $dates = ['deleted_at'];

	public function salida(){
    	return $this->belongsTo(Salida::class);
    }
    public function detalleingreso(){
    	return $this->belongsTo(DetalleIngreso::class,'detalle_ingreso_id');
    }
}
