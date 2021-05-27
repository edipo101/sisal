<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Producto extends Model
{
    protected $fillable = [
        // 'nro_sigma',
        'nombre',
        'descripcion',
        'categoria_id',
        'umedida_id',
        'imagen'
	];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

	public function umedida(){
    	return $this->belongsTo(Umedida::class);
    }
    public function categoria(){
    	return $this->belongsTo(Categoria::class);
    }
    public function detalle_ingresos(){
    	return $this->hasMany(DetalleIngreso::class);
    }

    public function scopeSearch($query, $buscar){
        return $query->where('nombre','LIKE',"%$buscar%");
    }

    public function getCantidadTotalAttribute(){
       // $ingresos = $this->detalle_ingresos()->sum('cantidad_ingreso'); ///
        return $this->stock_actual;
        $salidas = 0;
        $i = 0;        
        foreach ($this->detalle_ingresos as $detalle) {
            if (auth()->user()->almacen_id!=$detalle->ingreso->almacen_id) {
                continue;
            }else {
                foreach ($detalle->detallesalidas as $salida) {
                    $salidas += $salida->cantidad_salida;
                }
                $i=$i+$detalle->cantidad_ingreso;
            }
        }
        $total = $i - $salidas;
        return $total;
    }

    public function CantidadTotalAlmacen($id_almacen){
        $salidas = 0;
        $i = 0;        
        foreach ($this->detalle_ingresos as $detalle) {
            if ($id_almacen!=$detalle->ingreso->almacen_id) {
                continue;
            }else {
                foreach ($detalle->detallesalidas as $salida) {
                    $salidas += $salida->cantidad_salida;
                }
                $i=$i+$detalle->cantidad_ingreso;
            }
        }
        $total = $i - $salidas;
        return $total;
    }

    public function stock_almacen($almacen_id){
        $details = $this->detalle_ingresos;
        if (is_null($details)) return 0;
        else{
            // return ($details);
            $sum = 0;
            foreach ($details as $detail) {
                return ($detail->ingreso;
            }
            return $details->sum(function($detail){
                $ingreso = $detail->ingreso;
                dd($ingreso);
                return $ingreso->almacen_id;
                // print_r($detail->ingreso);
                // return $detail->ingreso['almacen_id'];
                // return ($detail->ingreso->almacen_id == $almacen_id) ? $detail->stock_ingreso : 0;
            });
        }
    }

    public function getPrecioUnitarioAttribute(){
       $ingresos = $this->detalle_ingresos()->sum('cantidad_ingreso');
        $salidas = 0;
        $i = 0;   
        $total =0;     
        foreach ($this->detalle_ingresos as $detalle) {
            if (auth()->user()->almacen_id!=$detalle->ingreso->almacen_id) {
                continue;
            }else {
                if ($detalle->detallesalidas) {
                    
                $salidas = 0;
                foreach ($detalle->detallesalidas as $salida) {
                    $salidas += $salida->cantidad_salida;
                    //$total = $detalle->cantidad_ingreso.'-'.$salidas.'*'.$detalle->precio_ingreso;
                }
            } 
            $total = $total + (( $detalle->cantidad_ingreso - $salidas) * $detalle->precio_ingreso);
            }
        }
        return $total;
    }

    public function getTotalAttribute(){
        $precio = $this->detalle_ingresos->avg('precio_ingreso');
        $cantidad = $this->getCantidadTotalAttribute();
        $preciototal = $precio*$cantidad;
        return $preciototal;
    }

    public function getStockActualAttribute(){
        $details = $this->detalle_ingresos;
        return (!is_null($details)) ? $details->sum('stock_ingreso'): 0;
    }

    public function getSaldoActualAttribute(){
        $details = $this->detalle_ingresos;
        if (is_null($details)) return 0;
        else
            return $details->sum(function($detail){
                return $detail->precio * $detail->stock_ingreso;
            });
    }

    public function getTotalActualAttribute(){
       $ingresos = $this->detalle_ingresos()->sum('cantidad_ingreso');
        $salidas = 0;
        $i = 0;   
        $total =0;
        $total_new =0;
        foreach ($this->detalle_ingresos as $detalle) {
            if (auth()->user()->almacen_id!=$detalle->ingreso->almacen_id) {
                continue;
            }else {
                if ($detalle->detallesalidas) {
                    
                $salidas = 0;
                foreach ($detalle->detallesalidas as $salida) {
                    $salidas += $salida->cantidad_salida;
                    //$total = $detalle->cantidad_ingreso.'-'.$salidas.'*'.$detalle->precio_ingreso;
                }
            } 
            $total = $total + (( $detalle->cantidad_ingreso - $salidas) * $detalle->precio_ingreso);
            }
        }
        return $total_new=$total_new+$total;
    }

    public function getDescripcionAttribute($value){
        return str_replace("\r\n", "; ", $value);   
    }

    public function getNombreDescripcionAttribute(){
        return Str::upper("{$this->nombre}; {$this->descripcion}");
    }

}

