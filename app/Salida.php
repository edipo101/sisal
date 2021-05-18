<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Salida extends Model
{
    protected $fillable = [
        'destino_id',
        'user_id',
        'almacen_id',
        'funcionario_id',
        // 'mecanico_id',
        // 'conductor_id',
        'cantidad',
        'total',
        'observacion'
	];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

	public function destino(){
    	return $this->belongsTo(Destino::class);
    }
    
    public function almacen(){
        return $this->belongsTo(Almacen::class);
    }
    
    public function user(){
    	return $this->belongsTo(User::class);
    }
    
    public function funcionario(){
    	return $this->belongsTo(Funcionario::class);
    }

    public function detalles(){
    	return $this->hasMany(Detalle::class);
    }

    public function scopeSearch($query, $buscar){
        return $query->where('destino_id','LIKE',"%$buscar%");
    }

    public function setObservacionAttribute($value){
        $this->attributes['observacion']= $value==null ? 'Sin Observaciones' : $value;
    }
}
