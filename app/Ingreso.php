<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Ingreso extends Model
{
    protected $fillable = [
		'proveedor_id','user_id','orden','preventivo','cantidad','total','observacion','almacen_id','destino_id'
	];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    
	public function proveedor(){
    	return $this->belongsTo(Proveedor::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function almacen(){
        return $this->belongsTo(Almacen::class);
    }

    public function destino(){
    	return $this->belongsTo(Destino::class);
    }

    public function detalles(){
    	return $this->hasMany(Detalle::class);
    }

    public function scopeSearch($query, $buscar){
        return $query->where('orden','LIKE',"%$buscar%")
                    ->orWhere('preventivo','LIKE',"%$buscar%");
    }

    public function setObservacionAttribute($value){
        $this->attributes['observacion']= $value==null ? 'Sin Observaciones' : $value;
    }
}
