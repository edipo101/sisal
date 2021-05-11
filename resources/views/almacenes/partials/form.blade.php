<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
	{{ Form::label('nombre', 'Nombre del Almacen') }}
	{{ Form::text('nombre',null,['class'=> 'form-control','id' => 'nombre']) }}

	@if ($errors->has('nombre'))
		<span class="help-block">
			<strong>{{ $errors->first('nombre') }}</strong>
		</span>
	@endif
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
	<a href="{{ route('almacenes.index') }}" class="btn btn-default">Atras</a>
</div>