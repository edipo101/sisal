<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $fillable = ['tipo', 'ingreso_id', 'salida_id', 'producto_id', 'cantidad', 'precio', 'subtotal', 'stock_final', 'saldo'];

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
