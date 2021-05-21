<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalle extends Model
{
    protected $fillable = ['tipo', 'ingreso_id', 'salida_id', 'producto_id', 'stock_inicial', 'saldo_inicial', 'cantidad', 'precio', 'subtotal', 'stock_final', 'saldo_final'];

    protected $dates = ['deleted_at'];
    use SoftDeletes;


	public function ingreso(){
    	return $this->belongsTo(Ingreso::class);
    }

    public function salida(){
    	return $this->belongsTo(Salida::class);
    }
    
    public function producto(){
    	return $this->belongsTo(Producto::class);
    }
}
