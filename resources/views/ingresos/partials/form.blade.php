<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('proveedor_id') ? ' has-error' : '' }}">
			{{ Form::label('proveedor_id', 'Nombre del proveedor') }}
            {{ Form::select('proveedor_id',$proveedors,null,['class'=> 'form-control select','id' => 'proveedor_id', 'placeholder' => 'Seleccione un proveedor']) }}

            @if ($errors->has('proveedor_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('proveedor_id') }}</strong>
                </span>
            @endif
        </div>
	</div>
    <div class="col-md-6">
		<div class="form-group{{ $errors->has('destino_id') ? ' has-error' : '' }}">
			{{ Form::label('destino_id', 'Unidad Ejecutora') }}
			{{ Form::select('destino_id',$destinos,null,['class'=> 'form-control select','id' => 'destino_id', 'placeholder' => 'Seleccione Unidad Ejecutora']) }}

			@if ($errors->has('destino_id'))
				<span class="help-block">
					<strong>{{ $errors->first('destino_id') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('orden') ? ' has-error' : '' }}">
			{{ Form::label('orden', 'Nro de orden') }}
            {{ Form::text('orden',null,['class'=> 'form-control','id' => 'orden']) }}
            
            @if ($errors->has('orden'))
                <span class="help-block">
                    <strong>{{ $errors->first('orden') }}</strong>
                </span>
            @endif
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('preventivo') ? ' has-error' : '' }}">
			{{ Form::label('preventivo', 'Preventivo') }}
            {{ Form::text('preventivo',null,['class'=> 'form-control','id' => 'preventivo']) }}
            
            @if ($errors->has('preventivo'))
                <span class="help-block">
                    <strong>{{ $errors->first('preventivo') }}</strong>
                </span>
            @endif
		</div>
	</div>
</div>
<div class="row">
	@include('ingresos.partials.detalle')
</div>

<div class="col-md-12">
	<div class="form-group">
	    {{ Form::label('observacion','Observaciones',['class'=>'form-label'])}}
	    {{ Form::textarea('observacion',null,['class'=>'form-control', 'rows'=>'3'])}}
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
			{{ Form::label('cantidad', 'Cantidad') }}
            {{ Form::text('cantidad',null,['class'=> 'form-control','id' => 'cantidad','readonly'=>'readonly']) }}
            
            @if ($errors->has('cantidad'))
                <span class="help-block">
                    <strong>{{ $errors->first('cantidad') }}</strong>
                </span>
            @endif
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
			{{ Form::label('total', 'Precio total') }}
            {{ Form::text('total',null,['class'=> 'form-control','id' => 'total','readonly'=>'readonly']) }}
            
            @if ($errors->has('total'))
                <span class="help-block">
                    <strong>{{ $errors->first('total') }}</strong>
                </span>
            @endif
		</div>
	</div>
</div>


<div class="form-group text-center">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
	<a href="{{ route('ingresos.index') }}" class="btn btn-default">Atras</a>
</div>