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
        // $details = $this->detalle_ingresos;
        // return (!is_null($details)) ? $details->->sum('stock_ingreso'): 0;
        return 0;
    }

    public function getSaldoActualAttribute(){
        // $detail = $this->detalles->last();
        // return (!is_null($detail)) ? $detail->saldo_final: 0;
        return 0;
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

