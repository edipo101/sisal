<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
	{{ Form::label('nombre', 'Nombre de la Unidad de Medida') }}
	{{ Form::text('nombre',null,['class'=> 'form-control','id' => 'nombre']) }}

	@if ($errors->has('nombre'))
		<span class="help-block">
			<strong>{{ $errors->first('nombre') }}</strong>
		</span>
	@endif
</div>
<div class="form-group{{ $errors->has('prefijo') ? ' has-error' : '' }}">
	{{ Form::label('prefijo', 'Abreviacion') }}
	{{ Form::text('prefijo',null,['class'=> 'form-control','id' => 'prefijo']) }}

	@if ($errors->has('prefijo'))
		<span class="help-block">
			<strong>{{ $errors->first('prefijo') }}</strong>
		</span>
	@endif
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
	<a href="{{ route('umedidas.index') }}" class="btn btn-default">Atras</a>
</div>