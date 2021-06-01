<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleSalida extends Model
{
    protected $fillable = [
		'salida_id', 'producto_id', 'stock_inicial', 'saldo_inicial', 'cantidad', 'precio', 'subtotal', 'detalle_ingreso_id'
	];

	use SoftDeletes;

    protected $dates = ['deleted_at'];

	public function salida(){
        return $this->belongsTo(Salida::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function detalle_ingreso(){
        return $this->belongsTo(DetalleIngreso::class);
    }
}
