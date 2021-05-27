<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleIngreso extends Model
{
	protected $fillable = ['ingreso_id', 'producto_id', 'stock_inicial', 'saldo_inicial', 'cantidad', 'precio', 'subtotal', 'stock_ingreso'];

	protected $dates = ['deleted_at'];
	use SoftDeletes;


	public function ingreso(){
		return $this->belongsTo(Ingreso::class);
	}

	public function producto(){
		return $this->belongsTo(Producto::class);
	}
}
